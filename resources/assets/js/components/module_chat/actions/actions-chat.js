import dispatcher from '../dispatcher/dispatcher';

export function createNewItem(text){
  axios.post('/add-chat',{text});
}

export function addNewChat(text){
  dispatcher.dispatch({
    type:'ADD_NEW_CHAT',
    text
  });
}

export function getChatHistory(){
  dispatcher.dispatch({
    type:'GET_CHAT_HISTORY'
  });
}
