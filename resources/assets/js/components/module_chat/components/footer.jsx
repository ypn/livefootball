import React from 'react';
import ReactDOM from 'react-dom';
import * as ActionsChat from '../actions/actions-chat';

export default class ChatFooter extends React.Component{


  autoExpandInput(e){
    var el = this.refs.entry_text;
    if(e.keyCode==13 && !e.shiftKey){
        e.preventDefault();
        ActionsChat.createNewItem(el.value);
        el.value ='';

    }

    el.style.cssText = 'height:auto; padding:0';
    el.style.cssText = 'height:' + el.scrollHeight + 'px';

    el.scrollTop = el.scrollHeight;
  }

  render(){
    return(
      <div className="live-chat-footer">
        <div className="wrap-entry-text">
          <textarea ref="entry_text" onKeyDown={this.autoExpandInput.bind(this)} type="text" className="form-control entry-message" rows="1" placeholder="Gửi chiến thuật"/>
        </div>
        <div className="emoji">
          <a href="javascript:void(0);"><img className="__act" src="https://garena.live/static/images/icon-emotes.png" /></a>
          <a href="javascript:void(0);"><img className="__act __act20" src="https://garena.live/static/images/icon-send.png"/></a>
        </div>
      </div>
    )
  }
}
