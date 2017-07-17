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
          id : note.id,
          text: note.text
        });
      });
      this.emit('get-chat-history');
    });
  }


  addNewChat(text){
    this.list.push({
      id:(new Date()).getTime(),
      text
    });
    this.emit('add-new-chat');
  }

  handleAction(action){
    switch (action.type) {
      case 'ADD_NEW_CHAT':
        this.addNewChat(action.text);
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
