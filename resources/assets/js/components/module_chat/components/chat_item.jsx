import React from 'react';
import Emojify from 'react-emojione';
import troll  from '../assets/image.jpg';

export default class ChatItem extends React.Component{
  render(){
    return(

        <div className="live-chat-item">
          <img className="live-chat-user-avatar"  src={troll}/>
          <div className="live-chat-content">
            <label>Guest</label>
            <span className="text-content">
              <Emojify style={{height: 27, width: 27}}>
                {this.props.chatText}
              </Emojify>
            </span>
          </div>
        </div>

    )
  }
}
