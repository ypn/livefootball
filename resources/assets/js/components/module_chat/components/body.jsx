import React from 'react';
import ReactDOM from 'react-dom';
import ChatStore from '../store/chat-store';
import ChatItem from './chat_item';

export default class ChatBody extends React.Component{

  constructor(props){
    super(props);
    this.state = {
      list:[]
    }
  }

  componentWillMount(){

    ChatStore.on('get-chat-history',()=>{
      this.setState({
        list:ChatStore.getList()
      });
    });

    ChatStore.on('add-new-chat',()=>{
      this.setState({
        list:ChatStore.getList()
      });
      this.refs.chat_body.scrollTop = this.refs.chat_body.scrollHeight;
    });

  }

  render(){
    return(
      <div ref="chat_body" className="live-chat-body">
        {
          this.state.list.map((note,index)=>{
            return(
                <ChatItem key={index} chatText={note.text} firstName = {note.first_name} lastName = {note.last_name} fbId = {note.fb_id}/>
            )
          })
        }
      </div>
    )
  }
}
