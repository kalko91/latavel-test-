const TelegramBot = require('node-telegram-bot-api');
const request = require('request');

// replace the value below with the Telegram token you receive from @BotFather
const token = '554973825:AAHmU_hSs5OYsmE9iQkbRW_JsjUSGIJ6LDE';
const site = 'http://127.0.0.1:8000';
// Create a bot that uses 'polling' to fetch new updates
const bot = new TelegramBot(token, {polling: true});

// Matches "/echo [whatever]"
bot.onText(/\/start (.+)/, (msg, match) => {
  // 'msg' is the received Message from Telegram
  // 'match' is the result of executing the regexp above on the text content
  // of the message
  


  const chatId = msg.chat.id;
  const resp = match[1]; 
  let html = '';   

    
    const userId = msg.from.id;
    if(resp.length>0){
        html = `Group <a href='https://t.me/joinchat/CUgtSA92tRbkE_KP1Lgpvw'> Link </a>\n`;
        html +=`Click here (<a href='${site}/invite?tg=${resp}&telegram_id=${userId}'>Link</a>) to register for a free account on Token`
        }
        console.log(html);
        bot.sendMessage(chatId, html,{parse_mode:'HTML'});
  
});

bot.on('new_chat_members', (msg,match) => {
    console.log('new_chat_members',msg,match);
    console.log(`${site}/telegramjoin?telegram_id=${msg.from.id}`);
    request.get(`${site}/telegramjoin?telegram_id=${msg.from.id}`)
})

bot.on('left_chat_member', (msg) => {
    console.log('left_chat_member');
    request.get(`${site}/telegramleft?telegram_id=${msg.from.id}`)
})

// bot.onText(/.*/, (msg, match) => {
//     console.log(msg,match);
// })

// Listen for any kind of message. There are different kinds of
// messages.
// bot.on('message', (msg) => {
//   const chatId = msg.chat.id;
// //   if(msg =='/start')
//   // send a message to the chat acknowledging receipt of their message
//   bot.sendMessage(chatId, 'Received your message');
// });