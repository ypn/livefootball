import React from 'react';
import ReactDOM from 'react-dom';

export default class ChatHeader extends React.Component{
  render(){
    return(
      <div className="live-chat-header">
        <img src="http://www.free-icons-download.net/images/live-messenger-logo-icon-65547.png"/><label>Trò chuyện trực tiếp</label>      
      </div>
    )
  }
}
