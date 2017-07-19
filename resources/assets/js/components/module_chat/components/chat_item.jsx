import React from 'react';
import Emojify from 'react-emojione';

export default class ChatItem extends React.Component{
  render(){
    return(

        <div className="live-chat-item">
          <img className="live-chat-user-avatar"  src="https://scontent.fhan4-1.fna.fbcdn.net/v/t1.0-1/p40x40/13254293_109487276138741_5056916569087081298_n.jpg?oh=a112f4b6e38eb3bfad1cbcc1a90bc5c1&oe=59DA73FD"/>
          <div className="live-chat-content">
            <label>Pham Nhu Y</label>
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
