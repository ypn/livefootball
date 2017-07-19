import React from 'react';
import ReactDOM from 'react-dom';

export default class ChatHeader extends React.Component{  
  render(){
    return(
      <div className="live-chat-header">
        <div
          className="fb-page"
          data-href="https://www.facebook.com/Bongdatv-Online-1613123475385651/"
          data-height="70px"
          data-tabs="timeline"
          data-small-header="true"
          data-adapt-container-width="true"
          data-hide-cover="false"
          data-show-facepile="false">
          <blockquote
            cite="https://www.facebook.com/Bongdatv-Online-1613123475385651/"
            className="fb-xfbml-parse-ignore">
            <a href="https://www.facebook.com/Bongdatv-Online-1613123475385651/">Bongdatv Online</a>
          </blockquote>
        </div>
      </div>
    )
  }
}
