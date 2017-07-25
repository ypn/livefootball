import React from 'react';
import ReactDOM from 'react-dom';
import Header from './header';
import Body from './body';
import Footer from './footer';
import * as ActionsChat from '../actions/actions-chat.js';

export default class ChatMaster extends React.Component{

  componentWillMount(){
    var socketId = Echo.socketId();
    console.log(socketId);
    Echo.channel('live-chat-channel')
      .listen('Event', (e) => {      
        ActionsChat.addNewChat(
          e.message,
          e.first_name,
          e.last_name,
          e.fb_id
        );
    });

    ActionsChat.getChatHistory();
  }

  render(){
    return(
      <div className="live-chat-master">
        <Header/>
        <Body/>
        <Footer/>
      </div>
    )
  }
}
