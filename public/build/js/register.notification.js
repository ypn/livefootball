document.addEventListener("DOMContentLoaded", () => {

    const applicationServerKey = "BCmti7ScwxxVAlB7WAyxoOXtV7J8vVCXwEDIFXjKvD-ma-yJx_eHJLdADyyzzTKRGb395bSAtxlh4wuDycO3Ih4";
    let isPushEnabled = false;

    const pushButton = document.querySelector('#push-subscription-button');
    if (!pushButton) {
        return;
    }

    pushButton.addEventListener('click', function() {
        if (isPushEnabled) {
            push_unsubscribe();
        } else {
            push_subscribe();
        }
    });

    if (!('serviceWorker' in navigator)) {
        console.warn("Service workers are not supported by this browser");
        changePushButtonState('incompatible');
        return;
    }

    if (!('PushManager' in window)) {
        console.warn('Push notifications are not supported by this browser');
        changePushButtonState('incompatible');
        return;
    }

    if (!('showNotification' in ServiceWorkerRegistration.prototype)) {
        console.warn('Notifications are not supported by this browser');
        changePushButtonState('incompatible');
        return;
    }

    // Check the current Notification permission.
    // If its denied, the button should appears as such, until the user changes the permission manually
    if (Notification.permission === 'denied') {
        console.warn('Notifications are denied by the user');
        changePushButtonState('incompatible');
        return;
    }

    navigator.serviceWorker.register("/livefootball/public/sw.js")
    .then(() => {
        console.log('[SW] Service worker has been registered');
        push_updateSubscription();
    }, e => {
        console.error('[SW] Service worker registration failed', e);
        changePushButtonState('incompatible');
    });

    function changePushButtonState (state) {
        switch (state) {
            case 'enabled':
                pushButton.disabled = false;
                pushButton.innerHTML = '<i class ="fa fa-bell"></i>Hủy nhận thông báo';
                isPushEnabled = true;
                break;
            case 'disabled':
                pushButton.disabled = false;
                pushButton.innerHTML = '<i class ="fa fa-bell-o"></i>Cho phép gửi thông báo';
                isPushEnabled = false;
                break;
            case 'computing':
                pushButton.disabled = true;
                pushButton.textContent = "Đang xử lý...";
                break;
            case 'incompatible':
                pushButton.disabled = true;
                pushButton.textContent = "Bạn đã chặn tính năng nhận thông báo trên trình duyệt";
                break;
            default:
                console.error('Unhandled push button state', state);
                break;
        }
    }

    function urlBase64ToUint8Array(base64String) {
        const padding = '='.repeat((4 - base64String.length % 4) % 4);
        const base64 = (base64String + padding)
            .replace(/\-/g, '+')
            .replace(/_/g, '/');

        const rawData = window.atob(base64);
        const outputArray = new Uint8Array(rawData.length);

        for (let i = 0; i < rawData.length; ++i) {
            outputArray[i] = rawData.charCodeAt(i);
        }
        return outputArray;
    }

    function push_subscribe() {
        changePushButtonState('computing');
        navigator.serviceWorker.ready
        .then(serviceWorkerRegistration => serviceWorkerRegistration.pushManager.subscribe({
            userVisibleOnly: true,
            applicationServerKey: urlBase64ToUint8Array(applicationServerKey),
        }))
        .then(subscription => {
             // Subscription was successful
            // create subscription on your server
            return push_sendSubscriptionToServer(subscription, 'POST');
        })
        .then(subscription => subscription && changePushButtonState('enabled')) // update your UI
        .catch(e => {
            if (Notification.permission === 'denied') {
                // The user denied the notification permission which
                // means we failed to subscribe and the user will need
                // to manually change the notification permission to
                // subscribe to push messages
                console.warn('Notifications are denied by the user.');
                changePushButtonState('incompatible');
            } else {
                // A problem occurred with the subscription; common reasons
                // include network errors or the user skipped the permission
                console.error('Impossible to subscribe to push notifications', e);
                changePushButtonState('disabled');
            }
        });
    }

    function push_updateSubscription() {
        navigator.serviceWorker.ready.then(serviceWorkerRegistration => serviceWorkerRegistration.pushManager.getSubscription())
        .then(subscription => {
            changePushButtonState('disabled');

            if (!subscription) {
                // We aren't subscribed to push, so set UI to allow the user to enable push
                return;
            }

            // Keep your server in sync with the latest endpoint
            return push_sendSubscriptionToServer(subscription, 'PUT');
        })
        .then(subscription => subscription && changePushButtonState('enabled')) // Set your UI to show they have subscribed for push messages
        .catch(e => {
            console.error('Error when updating the subscription', e);
        });
    }

    function push_unsubscribe() {
        changePushButtonState('computing');

        // To unsubscribe from push messaging, you need to get the subscription object
        navigator.serviceWorker.ready
        .then(serviceWorkerRegistration => serviceWorkerRegistration.pushManager.getSubscription())
        .then(subscription => {
            // Check that we have a subscription to unsubscribe
            if (!subscription) {
                // No subscription object, so set the state
                // to allow the user to subscribe to push
                changePushButtonState('disabled');
                return;
            }

            // We have a subscription, unsubscribe
            // Remove push subscription from server
            return push_sendSubscriptionToServer(subscription, 'DELETE');
        })
        .then(subscription => subscription.unsubscribe())
        .then(() => changePushButtonState('disabled'))
        .catch(e => {
            // We failed to unsubscribe, this can lead to
            // an unusual state, so  it may be best to remove
            // the users data from your data store and
            // inform the user that you have done so
            console.error('Error when unsubscribing the user', e);
            changePushButtonState('disabled');
        });
    }

    function push_sendSubscriptionToServer(subscription, method) {
        const key = subscription.getKey('p256dh');
        const token = subscription.getKey('auth');

        return fetch('/livefootball/public/push_subscription.php', {
            method,
            body: JSON.stringify({
                endpoint: subscription.endpoint,
                key: key ? btoa(String.fromCharCode.apply(null, new Uint8Array(key))) : null,
                token: token ? btoa(String.fromCharCode.apply(null, new Uint8Array(token))) : null
            }),
        }).then(() => subscription);
    }


     /**
      * START send_push_notification
      * this part handles the button that calls the endpoint that triggers a notification
      * in the real world, you wouldn't need this, because notifications are typically sent from backend logic
      */

     var sendPushButton = document.querySelector('#show-notification');
     if (!sendPushButton) {
         return;
     }

     sendPushButton.addEventListener('click', () =>
         navigator.serviceWorker.ready
         .then(serviceWorkerRegistration => serviceWorkerRegistration.pushManager.getSubscription())
         .then(subscription => {
             if (!subscription) {
                 alert('Hãy bật tính năng cho phép nhận thông báo');
                 return;
             }

             const key = subscription.getKey('p256dh');
             const token = subscription.getKey('auth');

             fetch('/livefootball/public/send_push_notification.php', {
                 method: 'POST',
                 body: JSON.stringify({
                     endpoint: subscription.endpoint,
                     key: key ? btoa(String.fromCharCode.apply(null, new Uint8Array(subscription.getKey('p256dh')))) : null,
                     token: token ? btoa(String.fromCharCode.apply(null, new Uint8Array(subscription.getKey('auth')))) : null
                 })
             }).then(function(response){
               if(response.status ===200){
                 alert('thành cmn công');
               }
             });
         })
     );
     /**
      * END send_push_notification
      */
});
