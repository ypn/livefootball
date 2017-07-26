import {EventEmitter} from 'events';
import dispatcher from '../dispatcher/dispatcher';

class ChatStore extends EventEmitter{

  constructor(){
    super();
    this.list = [];
  }

  getChatHistory(){
    axios.get('/list-chat').then((response)=>{
      response.data.map((note)=>{
        this.list.push({
          text:note.message,
          first_name:note.first_name,
          last_name:note.last_name,
          fb_id:note.fb_id
        });
      });
      this.emit('get-chat-history');
    });
  }

  addNewChat(text,first_name,last_name,fb_id){
    this.list.push({
      text,
      first_name,
      last_name,
      fb_id
    });
    this.emit('add-new-chat');
  }

  handleAction(action){
    switch (action.type) {
      case 'ADD_NEW_CHAT':
        this.addNewChat(action.text,action.first_name,action.last_name,action.fb_id);
        break;
      case 'GET_CHAT_HISTORY':
        this.getChatHistory();
        break;
      default:

    }
  }

  getList(){
    return this.list;
  }
}

const Store = new ChatStore();

dispatcher.register(Store.handleAction.bind(Store));


export default Store;
