var chatMessages = [
  {
    name: "ms1",
    msg: "Teacher, we had a class and you did't show up again!",
    delay: 500,
    align: "right",
    showTime: true,
    time: "19:58",
  },
  {
    name: "ms2",
    msg: "Oh, no! I'm sorry. I've been so busy lately. I don't know why, but it keeps happening!",
    delay: 6000,
    align: "left",
    showTime: true,
    time: "19:58",
  },
  {
    name: "ms3",
    msg: "Well, it's not cool. Please let me know next time!",
    delay: 3000,
    align: "right",
    showTime: true,
    time: "19:58",
  },
  {
    name: "ms4",
    msg: "Wait a minute. Have you paid for the next 10 sessions?",
    delay: 7000,
    align: "left",
    showTime: true,
    time: "19:58",
  },
  {
    name: "ms5",
    msg: "Well, I don’t know. I'm not sure how many session have been held...",
    delay: 3000,
    align: "right",
    showTime: true,
    time: "19:58",
  },
  {
    name: "ms6",
    msg: "Btw, my French teacher has his own Website, on which i can login with my username and see all my sessions, assignments and even payments... ",
    delay: 11000,
    align: "right",
    showTime: false,
    time: "19:58",
  },
  {
    name: "ms7",
    msg: "don’t you have one?",
    delay: 10000,
    align: "right",
    showTime: false,
    time: "19:58",
  },
  {
    name: "ms8",
    msg: "I even downloaded my books there. Every session before the class I should check my portal!",
    delay: 8000,
    align: "right",
    showTime: true,
    time: "19:58",
  },
  {
    name: "ms9",
    msg: "What do you mean? A personal webpage, on which you students have your own portal? Impossible!",
    delay: 4000,
    align: "left",
    showTime: true,
    time: "19:58",
  },
  {
    name: "ms10",
    msg: "Yeah it is possible! He says they have their own community there.",
    delay: 8000,
    align: "right",
    showTime: false,
    time: "19:58",
  },
  {
    name: "ms11",
    msg: "It's like teachers all talk to each other and share their thoughts.",
    delay: 4000,
    align: "right",
    showTime: true,
    time: "19:58",
  },
  {
    name: "ms12",
    msg: "Sounds fantastic!",
    delay: 4000,
    align: "left",
    showTime: true,
    time: "19:58",
  },
  {
    name: "ms13",
    msg: "It is.",
    delay: 9000,
    align: "right",
    showTime: true,
    time: "19:58",
  },
  {
    name: "ms14",
    msg: "It's all on Teacherstribe.net",
    delay: 3000,
    align: "right",
    showTime: true,
    time: "19:58",
  },
  {
    name: "ms15",
    msg: "Teachers' Tribe ... Sounds excellent! Gonna give it a go!",
    delay: 9000,
    align: "left",
    showTime: true,
    time: "19:58",
  },
];
var chatDelay = 0;

function onRowAdded() {
  $(".chat-container").animate({
    scrollTop: $(".chat-container").prop("scrollHeight"),
  });
}
$.each(chatMessages, function (index, obj) {
  chatDelay = chatDelay + 1000;
  chatDelay2 = chatDelay + obj.delay;
  chatDelay3 = chatDelay2 + 10;
  scrollDelay = chatDelay;
  chatTimeString = " ";
  msgname = "." + obj.name;
  msginner = ".messageinner-" + obj.name;
  spinner = ".sp-" + obj.name;
  if (obj.showTime == true) {
    chatTimeString = "<span class='message-time'>" + obj.time + "</span>";
  }
  $(".chat-message-list").append(
    "<li class='message-" +
      obj.align +
      " " +
      obj.name +
      "' hidden><div class='sp-" +
      obj.name +
      "'><span class='spinme-" +
      obj.align +
      "'><div class='spinner'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div></span></div><div class='messageinner-" +
      obj.name +
      "' hidden><span class='message-text'>" +
      obj.msg +
      "</span>" +
      chatTimeString +
      "</div></li>"
  );
  $(msgname).delay(chatDelay).fadeIn();
  $(spinner).delay(chatDelay2).hide(1);
  $(msginner).delay(chatDelay3).fadeIn();
  setTimeout(onRowAdded, chatDelay);
  setTimeout(onRowAdded, chatDelay3);
  chatDelay = chatDelay3;
});
