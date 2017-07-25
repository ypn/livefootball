import dispatcher from '../dispatcher/dispatcher';

export function createNewItem(text){
  axios.post('/add-chat',{text});
}

export function addNewChat(text,first_name,last_name,fb_id){
  dispatcher.dispatch({
    type:'ADD_NEW_CHAT',
    text,
    first_name,
    last_name,
    fb_id
  });
}

export function getChatHistory(){
  dispatcher.dispatch({
    type:'GET_CHAT_HISTORY'
  });
}
