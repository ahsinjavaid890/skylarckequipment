@extends('admin.layouts.header')
@section('content')
<style type="text/css">
.msger {
  display: flex;
  flex-flow: column wrap;
  justify-content: space-between;
  width: 100%;
  border: 2px solid #ddd;
  background: #fff;
  height: 800px;
}

.msger-header {
  display: flex;
  justify-content: space-between;
  padding: 10px;
  border-bottom: 2px solid #ddd;
  background: #eee;
  color: #666;
}

.msger-chat {
  flex: 1;
  overflow-y: auto;
  padding: 10px;
}
.msger-chat::-webkit-scrollbar {
  width: 6px;
}
.msger-chat::-webkit-scrollbar-track {
  background: #ddd;
}
.msger-chat::-webkit-scrollbar-thumb {
  background: #bdbdbd;
}
.msg {
  display: flex;
  align-items: flex-end;
  margin-bottom: 10px;
}
.msg:last-of-type {
  margin: 0;
}
.msg-img {
  width: 50px;
  height: 50px;
  margin-right: 10px;
  background: #ddd;
  background-repeat: no-repeat;
  background-position: center;
  background-size: cover;
  border-radius: 50%;
}
.msg-bubble {
  max-width: 450px;
  padding: 15px;
  border-radius: 15px;
  background: #ececec;
}
.msg-info {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 10px;
}
.msg-info-name {
  margin-right: 10px;
  font-weight: bold;
}
.msg-info-time {
  font-size: 0.85em;
}

.left-msg .msg-bubble {
  border-bottom-left-radius: 0;
}

.right-msg {
  flex-direction: row-reverse;
}
.right-msg .msg-bubble {
  background: #579ffb;
  color: #fff;
  border-bottom-right-radius: 0;
}
.right-msg .msg-img {
  margin: 0 0 0 10px;
}

.msger-inputarea {
  display: flex;
  padding: 10px;
  border-top: 2px solid #ddd;
  background: #eee;
}
.msger-inputarea * {
  padding: 10px;
  border: none;
  border-radius: 3px;
  font-size: 1em;
}
.msger-input {
  flex: 1;
  background: #ddd;
}
.msger-send-btn {
  margin-left: 10px;
  background: rgb(0, 196, 65);
  color: #fff;
  font-weight: bold;
  cursor: pointer;
  transition: background 0.23s;
}
.msger-send-btn:hover {
  background: rgb(0, 180, 50);
}

.msger-chat {
  background-color: #fcfcfe;
}
.allchatheader{
  padding: 10px;
  border: 1px solid #DDD;
}
.chatusers{
  height: 800px;
  overflow: auto;
}
</style>
<div id="content-wrapper">
  <div class="container-fluid">

    <div class="row">
      <div class="col-md-4">
          <div class="allchatheader">
              <h4>All Leave Messages</h4>
          </div>
          <div class="chatusers">
             @foreach(DB::table('chatleavemessages')->get() as $r)
              <div class="singlechat">
                 <div class="">
                {{ $r->chatname }}
                </div>
              </div>
              @endforeach
          </div>
      </div>
      <div class="col-md-8">
                <section class="msger">
        <header class="msger-header">
          <div class="msger-header-title">
            <i class="fas fa-comment-alt"></i> SimpleChat
          </div>
          <div class="msger-header-options">
            <span><i class="fas fa-cog"></i></span>
          </div>
        </header>

        <main class="msger-chat">
          <div class="msg left-msg">
            <div
             class="msg-img"
             style="background-image: url(https://image.flaticon.com/icons/svg/327/327779.svg)"
            ></div>

            <div class="msg-bubble">
              <div class="msg-info">
                <div class="msg-info-name">BOT</div>
                <div class="msg-info-time">12:45</div>
              </div>

              <div class="msg-text">
                Hi, welcome to SimpleChat! Go ahead and send me a message. 😄
              </div>
            </div>
          </div>

          <div class="msg right-msg">
            <div
             class="msg-img"
             style="background-image: url(https://image.flaticon.com/icons/svg/145/145867.svg)"
            ></div>

            <div class="msg-bubble">
              <div class="msg-info">
                <div class="msg-info-name">Sajad</div>
                <div class="msg-info-time">12:46</div>
              </div>

              <div class="msg-text">
                You can change your name in JS section!
              </div>
            </div>
          </div>


        </main>
        <form class="msger-inputarea">
          <input type="text" class="msger-input" placeholder="Enter your message...">
          <button type="submit" class="msger-send-btn">Send</button>
        </form>
      </section>
      </div>
    </div>


  </div>
</div>
@endsection