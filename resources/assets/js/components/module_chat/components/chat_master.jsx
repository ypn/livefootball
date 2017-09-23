import React from 'react';
import ReactDOM from 'react-dom';
import Header from './header';
import Body from './body';
import Footer from './footer';
import * as ActionsChat from '../actions/actions-chat.js';


export default class ChatMaster extends React.Component{
  constructor(props){
    super(props);
    axios.post('/chat/check-role').then((response)=>{
      alert('cccc');
      if(response.status == 200 && response.data){
        window.H7uGZw6c = response.data;
      }
    });
  }

  componentWillMount(){
    var socketId = Echo.socketId();
    Echo.channel('live-chat-channel')
      .listen('Event', (e) => {
        ActionsChat.addNewChat(
          e.message,
          e.first_name,
          e.last_name,
          e.fb_id,
          e.uid
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
