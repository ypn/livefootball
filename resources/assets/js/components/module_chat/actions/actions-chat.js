import dispatcher from '../dispatcher/dispatcher';

export function createNewItem(text){
  axios.post('/chat/add-chat',{text}).then((response)=>{
    if(response.data != null){
      switch (response.data) {
        case 'chat.block_lv2':
          dispatcher.dispatch({
            type:'ADD_NEW_CHAT',
            text:'Bạn đã bị khóa mõm!',
            first_name:'Hệ thống',
            last_name:'thông báo',
            fb_id:'1613123475385651',
            user_id:0
          });
          break;
        case 'chat.delete':
          break;
        default:
      }
    }
  });
}

export function addNewChat(text,first_name,last_name,fb_id,user_id){
  dispatcher.dispatch({
    type:'ADD_NEW_CHAT',
    text,
    first_name,
    last_name,
    fb_id,
    user_id
  });
}

export function getChatHistory(){
  dispatcher.dispatch({
    type:'GET_CHAT_HISTORY'
  });
}
