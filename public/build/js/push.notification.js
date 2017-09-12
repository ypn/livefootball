document.addEventListener('DOMContentLoaded',()=>{
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
          changeSendButtonState('onComputing');

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
              alert('Đã gửi thông báo!');         
              changeSendButtonState('onReady');
            }
          });
      })
  );
  /**
   * END send_push_notification
   */

   function changeSendButtonState(state){
     switch(state){
       case 'onComputing':
         sendPushButton.innerHTML = 'Đang xử lý...';
         sendPushButton.disabled = true;
        break;
      case 'onReady':
        sendPushButton.innerHTML = 'Gửi thông báo';
        sendPushButton.disabled = false;
        break;
      default:
        senPushButton.innerHTML = 'Tính năng gửi thông báo bị lỗi';
        senPushButton.disabled = true;
        break;
     }
   }


});
