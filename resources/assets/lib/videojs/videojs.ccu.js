console.log('vjsccu: Start');

(function() {
  console.log('vjsccu: Init defaults');
  var defaults = {
        top: 60,
        right: 23,
        count:0,
        opacity: 0.8,
        className: 'vjs-ccu'
    },
    extend = function() {
      var args, target, i, object, property;
      args = Array.prototype.slice.call(arguments);
      target = args.shift() || {};
      for (i in args) {
        object = args[i];
        for (property in object) {
          if (object.hasOwnProperty(property)) {
            if (typeof object[property] === 'object') {
              target[property] = extend(target[property], object[property]);
            } else {
              target[property] = object[property];
            }
          }
        }
      }
      return target;
    };

    //! global varible containing reference to the DOM element
    var div;

  /**
   * register the thubmnails plugin
   */
  videojs.plugin('vjsccu', function(settings) {
    if (settings.debug) console.log('vjsccu: Register init');

    var options, player, video, img, link;
    options = extend(defaults, settings);

    /* Grab the necessary DOM elements */
    player = this.el();
    video = this.el().getElementsByTagName('video')[0];

    // create the watermark element
    if (!div) {
        div = document.createElement('div');
        div.className = options.className;
    }else{
      div.innerHTML ='';
    }
    div.innerHTML = '<i class="fa fa-user" aria-hidden="true"></i><span>1</span>';

    if(options.count){
      div.getElementsByTagName('span')[0].innerHTML = options.count;
    }

    //img.style.bottom = "0";
    //img.style.right = "0";
    if (options.top) // Top left
    {
      div.style.top = options.top + 'px';
    }

    if (options.right) // Top right
    {
      div.style.right = options.right + 'px';
    }


    div.style.position = 'absolute';
    div.style.opacity = options.opacity;
    player.appendChild(div);


    if (options.debug) console.log('vjsccu: Register end');
  });
})();
