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
            if (message.message == null && message.document_path  ) {
                        if (message.sender_id == authId ) {
                            const span = document.createElement('div');
                            span.innerHTML = `<p style="font-size: 11px ; color:rgb(230, 225, 225) ; margin:0">${message.sender_name} : </p><p style="font-size:12px;margin-bottom:5px">${message.document_path.split('/')[message.document_path.split('/').length - 1].replace('/documents/', '')} :</p>
                            <div style="display:flex ; justify-content:center"><a href="/download/${message.id}" style="background-color: #2d23b9 ; color:white ;font-size:10px " class="btn" >Download</a></div>`; ;
                            span.classList.add('msg_sent');
                            messagesDiv.appendChild(span);   
                        } else {
                            const span = document.createElement('div');
                            span.innerHTML = `<p style="font-size: 11px ; color:rgb(230, 225, 225) ; margin:0">${message.sender_name} : </p><p style="font-size:12px;margin-bottom:5px">${message.document_path.split('/')[message.document_path.split('/').length - 1].replace('/documents/', '')} :</p>
                            <div style="display:flex ; justify-content:center"><a href="/download/${message.id}" class="btn btn-light" style=";font-size:10px" >Download</a></div>`; ;
                            span.classList.add('msg_rec');
                            messagesDiv.appendChild(span);   
                        }
                          
            }else if (message.message && message.document_path ){
                if (message.sender_id == authId ) {
                    const span = document.createElement('div');
                    span.innerHTML = `<p style="font-size: 11px ; color:rgb(230, 225, 225) ; margin:0">${message.sender_name} : </p><p style="margin-bottom:0px">${message.message}</p><p style="font-size:12px;margin-bottom:5px">${message.document_path.split('/')[message.document_path.split('/').length - 1].replace('/documents/', '')} :</p>
                    <div style="display:flex ; justify-content:center"><a href="/download/${message.id}" style="background-color: #2d23b9 ; color:white ;;font-size:10px " class="btn" >Download</a></div>`; ;
                    span.classList.add('msg_sent');
                    messagesDiv.appendChild(span);   
                } else {
                    const span = document.createElement('div');
                    span.innerHTML = `<p style="font-size: 11px ; color:rgb(230, 225, 225) ; margin:0">${message.sender_name} : </p><p style="margin-bottom:0px">${message.message}</p><p style="font-size:12px;margin-bottom:5px">${message.document_path.split('/')[message.document_path.split('/').length - 1].replace('/documents/', '')} :</p>
                    <div style="display:flex ; justify-content:center"><a href="/download/${message.id}" class="btn btn-light" style=";font-size:10px" >Download</a></div>`; ;
                    span.classList.add('msg_rec');
                    messagesDiv.appendChild(span);   
                }
            }else{
                const span = document.createElement('span');
                span.innerHTML = `<p style="font-size: 11px ; color:rgb(230, 225, 225) ; margin:0">${message.sender_name} : </p>${message.message}`; ;
                if (message.sender_id == authId) {
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
                if (message.message == null && message.document_path  ) {
                            if (message.sender_id == authId ) {
                                const span = document.createElement('div');
                                span.innerHTML = `<p style="font-size: 11px ; color:rgb(230, 225, 225) ; margin:0">${message.sender_name} : </p><p style="font-size:12px;margin-bottom:5px">${message.document_path.split('/')[message.document_path.split('/').length - 1].replace('/documents/', '')} :</p>
                                <div style="display:flex ; justify-content:center"><a href="/download/${message.id}" style="background-color: #2d23b9 ; color:white ;;font-size:10px " class="btn" >Download</a></div>`; ;
                                span.classList.add('msg_sent');
                                messagesDiv.appendChild(span);   
                            } else {
                                const span = document.createElement('div');
                                span.innerHTML = `<p style="font-size: 11px ; color:rgb(230, 225, 225) ; margin:0">${message.sender_name} : </p><p style="font-size:12px;margin-bottom:5px">${message.document_path.split('/')[message.document_path.split('/').length - 1].replace('/documents/', '')} :</p>
                                <div style="display:flex ; justify-content:center"><a href="/download/${message.id}" class="btn btn-light" style=";font-size:10px" >Download</a></div>`; ;
                                span.classList.add('msg_rec');
                                messagesDiv.appendChild(span);   
                            }
                              
                }else if (message.message && message.document_path ){
                    if (message.sender_id == authId ) {
                        const span = document.createElement('div');
                        span.innerHTML = `<p style="font-size: 11px ; color:rgb(230, 225, 225) ; margin:0">${message.sender_name} : </p><p style="margin-bottom:0px">${message.message}</p><p style="font-size:12px;margin-bottom:5px">${message.document_path.split('/')[message.document_path.split('/').length - 1].replace('/documents/', '')} :</p>
                        <div style="display:flex ; justify-content:center"><a href="/download/${message.id}" style="background-color: #2d23b9 ; color:white ;;font-size:10px " class="btn" >Download</a></div>`; ;
                        span.classList.add('msg_sent');
                        messagesDiv.appendChild(span);   
                    } else {
                        const span = document.createElement('div');
                        span.innerHTML = `<p style="font-size: 11px ; color:rgb(230, 225, 225) ; margin:0">${message.sender_name} : </p><p style="margin-bottom:0px">${message.message}</p><p style="font-size:12px;margin-bottom:5px">${message.document_path.split('/')[message.document_path.split('/').length - 1].replace('/documents/', '')} :</p>
                        <div style="display:flex ; justify-content:center"><a href="/download/${message.id}" class="btn btn-light" style=";font-size:10px" >Download</a></div>`; ;
                        span.classList.add('msg_rec');
                        messagesDiv.appendChild(span);   
                    }
                }else{
                    const span = document.createElement('span');
                    span.innerHTML = `<p style="font-size: 11px ; color:rgb(230, 225, 225) ; margin:0">${message.sender_name} : </p>${message.message}`; ;
                    if (message.sender_id == authId) {
                        span.classList.add('msg_sent');
                    } else {
                        span.classList.add('msg_rec');
                    }
                    messagesDiv.appendChild(span);  
                }
                    
                });
        messagesDiv.scrollTop = messagesDiv.scrollHeight;
    });