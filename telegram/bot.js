const TelegramBot = require('node-telegram-bot-api');

// replace the value below with the Telegram token you receive from @BotFather
const token = '554973825:AAHmU_hSs5OYsmE9iQkbRW_JsjUSGIJ6LDE';
const site = 'http://www.localhost:8000';
// Create a bot that uses 'polling' to fetch new updates
const bot = new TelegramBot(token, {polling: true});

// Matches "/echo [whatever]"
bot.onText(/\/start (.+)/, (msg, match) => {
  // 'msg' is the received Message from Telegram
  // 'match' is the result of executing the regexp above on the text content
  // of the message

  const chatId = msg.chat.id;
  const resp = match[1]; // the captured "whatever"
  let html = '';   
  // send back the matched "whatever" to the chat
  if(resp.length>0){
  html = `
    Click here (<a href='${site}/invite?tg=${resp}'>Link</a>) to register for a free account on Token
  `;
  }
  console.log(html);
  bot.sendMessage(chatId, html,{parse_mode:'HTML'});
});

// Listen for any kind of message. There are different kinds of
// messages.
// bot.on('message', (msg) => {
//   const chatId = msg.chat.id;
// //   if(msg =='/start')
//   // send a message to the chat acknowledging receipt of their message
//   bot.sendMessage(chatId, 'Received your message');
// });