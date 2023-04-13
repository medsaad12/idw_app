import './bootstrap';

function getData(){
    var authId = document.getElementById('authId').value
    const messagesDiv = document.getElementsByClassName('messages')[0];
    if (messages.length == 0) {
        const img = document.getElementById('no-msg').style.display = "flex"
    } else {
        const img = document.getElementById('no-msg').style.display = "none"
    }
    messages.forEach(message => {
        if (message.message == null) {
            
        } else {
            const span = document.createElement('div');
            span.innerHTML = `<p style="font-size: 11px ; color:rgb(230, 225, 225) ; margin:0">${message.sender_name} : </p>${message.message}`; ;
            if (message.sender_id == authId ) {
                span.classList.add('msg_sent');
            } else {
                span.classList.add('msg_rec');
            }
            messagesDiv.appendChild(span); 
        }
             
        });
    messagesDiv.scrollTop = messagesDiv.scrollHeight;
}

setInterval(getData(), 1);

var groupId = document.getElementById('groupId').value 

Echo.private('room.'+groupId)
    .listen('GroupMessageSent', function(e) {
        messages.push(e.message)
            var authId = document.getElementById('authId').value
            const messagesDiv = document.getElementsByClassName('messages')[0];
            messagesDiv.innerHTML = ''
            messages.forEach(message => {
                if (message.message == null) {
            
                } else {
                    const span = document.createElement('div');
                    span.innerHTML = `<p style="font-size: 11px ; color:rgb(230, 225, 225) ; margin:0">${message.sender_name} : </p>${message.message}`; ;
                    if (message.sender_id == authId ) {
                        span.classList.add('msg_sent');
                    } else {
                        span.classList.add('msg_rec');
                    }
                    messagesDiv.appendChild(span); 
                }
            });
        messagesDiv.scrollTop = messagesDiv.scrollHeight;
    });
