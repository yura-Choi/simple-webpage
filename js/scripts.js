function checkPW(callback){
    var PW = document.getElementById('pw');
    var confPW = document.getElementById('pw_confirm');
    var result = document.getElementById('messagePW');
    result.style.visibility = 'visible';
    if(PW.value != confPW.value || confPW.value == '') {
        result.innerText = 'Incorrect';
        result.style.color = 'red';
        callback();
        return false;
    } else {
        result.innerText = 'OK';
        result.style.color = 'green';
        callback();
        return true;
    }
}

function join_checkNickname(){
    var xhttp = new XMLHttpRequest();
    var nick = document.getElementById('nickname').value;
    if(nick === ''){
        alert('Input nickname value.');
        return false;
    }
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText == 'OK'){
                document.getElementById('nicknameValid').style.backgroundColor = '#198754';
                document.getElementById("nicknameValid").innerText = 'OK';
                document.getElementById("nickname").readOnly = true;
                document.getElementById('reset').style.display = 'inline-block';
                join_checkCondition();
            } else { // duplicated
                document.getElementById('nicknameValid').style.backgroundColor = '#dc3545';
                document.getElementById("nicknameValid").innerText = 'Duplicated';
                join_checkCondition();
            }
        }
    }
    xhttp.open("POST", "./process/join_nickname_process.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("nickname="+joinForm.nickname.value);
}

function join_checkCondition(){
    var pw = document.getElementById('messagePW').innerText;
    var nickname = document.getElementById('nicknameValid').innerText;
    var btn = document.getElementById('join');
    if(pw == 'OK' && nickname == 'OK'){
        btn.disabled = false;
    } else {
        btn.disabled = true;
    }
}

function getContact(){
    var contact = document.getElementById('contact');
    contact.setAttribute('value', '+82 1000000000');
}

function resetNickname(callback){
    document.getElementById("nicknameValid").style.backgroundColor = '#6c757d';
    document.getElementById("nicknameValid").innerText = 'Check nickname';
    document.getElementById('nickname').readOnly = false;
    document.getElementById('reset').style.display = 'none';
    callback();
}

function showPost(id){
    location.href = "../post.php?id="+id;
}

function getPostContent(id, callback){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200){        
            var result = JSON.parse(this.responseText);
            document.getElementById('title').innerHTML = result['title'];
            document.getElementById('content').innerHTML = result['content'];
            document.getElementById('author').innerHTML = result['nickname'];
            document.getElementById('created').innerHTML = result['created'].slice(0, 10);
            callback(result['author_id']);
        }
    }
    xhttp.open("POST", "./process/post_process.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id="+id);
}

function getModifyContent(id, callback){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var result = JSON.parse(this.responseText);
            document.getElementById('title').value = result['title'];
            document.getElementById('content').value = result['content'];
            document.getElementById('created').innerHTML = "Created: " + result['created'].slice(0, 10);
            callback(result['author_id']);
        }
    }
    xhttp.open("POST", "./process/post_process.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("id="+id);
}

function getMyinfoContent(userId){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            var result = JSON.parse(this.responseText);
            document.getElementById('id').value = result['user_id'];
            document.getElementById('nickname').value = result['nickname'];
        }
    }
    xhttp.open("POST", "./process/mypage_get_process.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("userId="+userId);
}

function mypage_checkNickname(userId){
    var xhttp = new XMLHttpRequest();
    var nick = document.getElementById('nickname').value;
    if(nick === ''){
        alert('Input nickname value.');
        return false;
    }
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText == 'OK'){
                document.getElementById('nicknameValid').style.backgroundColor = '#198754';
                document.getElementById("nicknameValid").innerText = 'OK';
                document.getElementById("nickname").readOnly = true;
                document.getElementById('reset').style.display = 'inline-block';
                mypage_checkCondition();
            } else { // duplicated
                document.getElementById('nicknameValid').style.backgroundColor = '#dc3545';
                document.getElementById("nicknameValid").innerText = 'Duplicated';
                mypage_checkCondition();
            }
        }
    }
    xhttp.open("POST", "./process/mypage_nickname_process.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("nickname="+joinForm.nickname.value+"&userId="+userId);
}

function mypage_checkCondition(){
    var pw = document.getElementById('messagePW').innerText;
    var nickname = document.getElementById('nicknameValid').innerText;
    var btn = document.getElementById('update');
    if(pw == 'OK' && nickname == 'OK'){
        btn.disabled = false;
    } else {
        btn.disabled = true;
    }
}

function withdrawAcc(userId){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            if(this.responseText == 'OK'){
                alert("Your account is deleted successfully. Thank you.");
                location.href="../index.php";
                return true;
            } else {
                alert("Failed to withdrawal.");
                location.href="../mypage.php";
                return false;
            }
        }
    }
    xhttp.open("POST", "./process/mypage_withdrawal_process.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("userId="+userId);
}
