import './bootstrap';

function getData(){
    var id = document.getElementById('receiver').value
    const messagesDiv = document.getElementsByClassName('messages')[0];
    if (messages.length == 0) {
        const img = document.getElementById('no-msg').style.display = "flex"
    } else {
        const img = document.getElementById('no-msg').style.display = "none"
    }
    messages.forEach(message => {
            const span = document.createElement('span');
            span.textContent = message.message;
            if (message.receiver_id == id ) {
                span.classList.add('msg_sent');
            } else {
                span.classList.add('msg_rec');
            }
            messagesDiv.appendChild(span);  });
    messagesDiv.scrollTop = messagesDiv.scrollHeight;
}

setInterval(getData(), 1);



var userId = document.getElementById('userId').value 

Echo.private('chat.'+userId)
    .listen('MessageSent', (e) => {
        messages.push(e.message)
        var id = document.getElementById('receiver').value
       const messagesDiv = document.getElementsByClassName('messages')[0];
        messagesDiv.innerHTML = ''
        messages.forEach(message => {
            const span = document.createElement('span');
            span.textContent = message.message;
            if (message.receiver_id == id ) {
                span.classList.add('msg_sent');
            } else {
                span.classList.add('msg_rec');
            }
            messagesDiv.appendChild(span);  });
        messagesDiv.scrollTop = messagesDiv.scrollHeight;
});