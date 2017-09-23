import React from 'react';
import Emojify from 'react-emojione';

export default class ChatItem extends React.Component{

  constructor(props){
    super(props);
    this.state = {
      showBtnSetting:false,
      showMenu:false
    }
  }

  showMenu(){
    axios.post('/chat/check-baned-user',{
      userId: this.props.userId
    }).then((response)=>{
      if(response.data!==null){
        this.setState({
          bandType:response.data
        });
      }
      this.setState({
        showMenu:true
      });
    });
  }

  checkRole(){
    if(typeof window.H7uGZw6c !== 'undefined' && window.H7uGZw6c!='no-role'){
      this.setState({
        showBtnSetting:true
      });
    }
    return;
  }
  mouseOut(){
    if(this.state.showBtnSetting){
      this.setState({
        showBtnSetting:false,
        showMenu:false
      });
    }
    return;
  }

  handlerComment(refName){
    let _action = refName.target.getAttribute('data-action');
    axios.post('/chat/handler-violate',{
      _action,
      user_id:this.props.userId
    }).then((response)=>{
      alert(response.data);
    });
  }

  render(){
    let url = 'http://graph.facebook.com/' + this.props.fbId + '/picture?type=square';

    let expression =1;
    let menuItem = this.state.showMenu ? (
      <div className="item-menu">
        <ul>
          {
            window.H7uGZw6c == 'admin' ? (
            <li>
                <ul>
                    <li><a href="javascript:void(0);" data-action="chat.block_lv1" onClick={this.handlerComment.bind(this)}>{(this.state.bandType !==undefined && this.state.bandType === 'chat.block_lv1') ? "⚓Đã là chó" :"Biến thành chó"}</a><hr/></li>
                    <li><a href="javascript:void(0);" data-action="2" onClick={this.handlerComment.bind(this)}>Cấm tài khoản</a><hr/></li>
                    <li><a href="javascript:void(0);" data-action="3" onClick={this.handlerComment.bind(this)}>Cấm ip</a><hr/></li>
                </ul>
              </li>
            ) :null
          }
          <li><a href="javascript:void(0);"  data-action="chat.block_lv2" onClick={this.handlerComment.bind(this)}>{(this.state.bandType !==undefined && this.state.bandType === 'chat.block_lv2') ? "⚓Đã khóa mõm" :"Khóa mõm"}</a><hr/></li>       
          <li><a href="javascript:void(0);"  data-action="chat.delete" onClick={this.handlerComment.bind(this)}>Xóa bình luận</a></li>
        </ul>
      </div>
    ) : null;

    let btnSetting = this.state.showBtnSetting ? (
      <div>
        <div className="_setting">
          <a href="javascript:void(0);" onClick={this.showMenu.bind(this)}><i className="fa fa-cog" aria-hidden="true"></i></a>
          {menuItem}
        </div>
      </div>
    ):null;

    return(
      <div style={{padding:15}} onMouseOver={this.checkRole.bind(this)} onMouseLeave={this.mouseOut.bind(this)}>
        <div className={"live-chat-item" + (this.state.showBtnSetting ? " no-full-width" :"")}>
          <img className="live-chat-user-avatar"  src={url} />
          <div className="live-chat-content">
            <label>{this.props.firstName + ' ' + this.props.lastName}</label>
            <span className="text-content">
              <Emojify style={{height: 27, width: 27}}>
                {this.props.chatText}
              </Emojify>
            </span>
          </div>
        </div>
        {btnSetting}
        <span className="clearfix"></span>
      </div>
    )
  }
}
