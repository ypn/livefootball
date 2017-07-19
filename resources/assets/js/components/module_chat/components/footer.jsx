import React from 'react';
import ReactDOM from 'react-dom';
import * as ActionsChat from '../actions/actions-chat';
import Emojify from 'react-emojione';
// import $ from 'jquery';

export default class ChatFooter extends React.Component{

  constructor(props){
    super(props);
    this.state = {
      emojiToggle:false,
      auth:false
    }
  }

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

  toggleEmoji(){
    this.setState({
      emojiToggle:!this.state.emojiToggle
    })
  }

  addEmoji(e){
      var el = this.refs.entry_text;
      el.value +=e.target.title;
  }

  forcusType(){
    $('.popup').fadeIn(200);//this pop up is render in footer component of chat div.
    $('[data-popup-close]').on('click', function(e)  {
        var targeted_popup_class = jQuery(this).attr('data-popup-close');
        $('[data-popup="' + targeted_popup_class + '"]').fadeOut(200);
        e.preventDefault();
    });
  }

  render(){

    var emoji = this.state.emojiToggle ?
      (
        <div className="list-emojione">
          <Emojify style={{height: 32, width: 32}} onClick={this.addEmoji.bind(this)}>
            <span>
              :smile: :laughing: :blush: :smiley: :relaxed: :smirk: :heart_eyes: :kissing_heart: :kissing_closed_eyes: :flushed: :relieved: :grin: :wink: :stuck_out_tongue_winking_eye: :stuck_out_tongue_closed_eyes: :grinning: :kissing: :kissing_smiling_eyes: :stuck_out_tongue: :sleeping: :worried: :frowning: :anguished: :open_mouth: :grimacing: :confused: :hushed: :expressionless: :unamused: :sweat_smile: :sweat: :disappointed_relieved: :weary: :pensive: :disappointed: :confounded: :fearful: :cold_sweat: :persevere: :cry: :sob: :joy: :astonished: :scream: :tired_face: :angry: :rage: :triumph: :sleepy: :yum: :mask: :sunglasses: :dizzy_face: :imp: :smiling_imp: :neutral_face: :no_mouth: :innocent: :alien: :yellow_heart: :blue_heart: :purple_heart: :heart: :green_heart: :broken_heart: :heartbeat: :heartpulse: :two_hearts: :revolving_hearts: :cupid: :sparkling_heart: :sparkles: :star: :star2: :dizzy: :boom: :anger: :exclamation: :question: :grey_exclamation: :grey_question: :zzz: :dash: :sweat_drops: :notes: :musical_note: :fire: :poop: :thumbsup: :thumbsdown: :ok_hand: :punch: :fist: :v: :wave: :raised_hand: :open_hands: :point_up: :point_down: :point_left: :point_right: :raised_hands: :pray: :point_up_2: :clap: :muscle: :metal: :runner: :couple: :family: :two_men_holding_hands: :two_women_holding_hands: :dancer: :dancers: :ok_woman: :no_good: :information_desk_person: :raising_hand: :bride_with_veil: :person_with_pouting_face: :person_frowning: :bow: :couplekiss: :couple_with_heart: :massage: :haircut: :nail_care: :boy: :girl: :woman: :man: :baby: :older_woman: :older_man: :person_with_blond_hair: :man_with_gua_pi_mao: :man_with_turban: :construction_worker: :cop: :angel: :princess: :smiley_cat: :smile_cat: :heart_eyes_cat: :kissing_cat: :smirk_cat: :scream_cat: :crying_cat_face: :joy_cat: :pouting_cat: :japanese_ogre: :japanese_goblin: :see_no_evil: :hear_no_evil: :speak_no_evil: :guardsman: :skull: :feet: :lips: :kiss: :droplet: :ear: :eyes: :nose: :tongue: :love_letter: :bust_in_silhouette: :busts_in_silhouette: :speech_balloon: :thought_balloon:
            </span>
          </Emojify>
        </div>
      ) :null;
    return(
      <div className="live-chat-footer">
        <div className="wrap-entry-text">
          <textarea ref="entry_text" onFocus={this.forcusType.bind(this)} onKeyDown={this.autoExpandInput.bind(this)} type="text" className="form-control entry-message" rows="1" placeholder="Gửi chiến thuật"/>
          <div className="popup" data-popup="popup-1">
            <div className="popup-inner">
              <a className="popup-close" data-popup-close="popup-1" href="javascript:void(0);">x</a>
              <div>
                  <p>
                  Tính năng này chỉ dành cho thành viên, hãy đăng nhập để có trải nghiệm tốt nhất về dịch vụ của chúng tôi.
                  </p>
                  <a
                    className="loginBtn loginBtn--facebook"
                    href="https://www.facebook.com/v2.8/dialog/oauth?client_id=1812749958752149&amp;state=2d69d288a8a09e33ecdd1bdc3a2ff4dc&amp;response_type=code&amp;sdk=php-sdk-5.5.0&amp;redirect_uri=http%3A%2F%2Fbongdahd.tv%2Ffb-callback&amp;scope=email"
                  >
                      Login with facebook
                  </a>
              </div>
            </div>
          </div>
        </div>
        <div className="emoji">
          <a href="javascript:void(0);" className="toggle-emoji" onClick={this.toggleEmoji.bind(this)}>
            <img className="__act" src="https://garena.live/static/images/icon-emotes.png" />
            {emoji}
          </a>
          <a href="javascript:void(0);"><img className="__act __act20" src="https://garena.live/static/images/icon-send.png"/></a>
        </div>
      </div>
    )
  }
}
