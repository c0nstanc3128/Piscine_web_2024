<!DOCTYPE html>
<head>
    <title>Accueil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" href="images/logo_onglet.png" class="rounded-circle img-circle" type="image/png">
</head>
<html>
  <body>
      

  
    <h2>Chatroom</h2>
    
    <button onclick="openChatroom()">Open Chatroom</button>
    
    <script>

    const fs = require('fs');
   
    function openChatroom() {
        var chatroomWindow = window.open('', 'Chatroom', 'width=500,height=500');
        chatroomWindow.document.write('<h2>Chatroom</h2>');
        chatroomWindow.document.write('<div id="chatroom"></div>');
        chatroomWindow.document.write('<input id="username" type="text" placeholder="Your name">');
        chatroomWindow.document.write('<input id="message" type="text" placeholder="Type your message here">');
        chatroomWindow.document.write('<button onclick="addMessage()">Send</button>');

    var name1 = "<?php echo $Id_user; ?>";
    var name2 = "<?php echo $Id_contact; ?>";
    check_exist(name1,name2);
    }
    function chatroom(name1, name2) {

      var s_name1 = name1.replace(/[^a-z0-9]/gi, '_').toLowerCase();
      var s_name2 = name2.replace(/[^a-z0-9]/gi, '_').toLowerCase();
      return [s_name1, s_name2];
    }
    function crea_fichier(name1, name2) {
      //création du nom du fichier xml
      var [s_name1, s_name2] = chatroom(name1, name2);
      var nom_fichier = s_name1 + '_' + s_name2 + '.xml';
      return nom_fichier;
    }
    //check si le fichier existe sous les 2 noms possibles ( 2 individus max par chatroom )
    function check_exist(name1, name2) {
      var nom_fichier1 = crea_fichier(name1, name2);
      var nom_fichier2 = crea_fichier(name2, name1);
      fs.access(nom_fichier1, fs.constants.F_OK, (err) => {
        if (err) {
            fs.access(nom_fichier2, fs.constants.F_OK, (err) => {
                if (err) {
                    console.log('The file does not exist.');
                    // Here you can call the function to create the file
                    
                } else {
                    console.log('The file exists.');
                  read_chatroom(nom_fichier2);
                }
            });
        } else {
            console.log('The file exists.');
            read_chatroom(nom_fichier1);
        }
      });
    }
    
    function read_chatroom(namefile_xml){
      fs.readFile(namefile_xml,'utf-8', (readError, data) => {
        if (readError) {
            console.log("Error reading file:", readError);
            return;
        }
        display_chatroom(namefile_xml);
      };
    }
    function display_chatroom(fname){
      // Fetch the XML data from the server
        fetch(fname)
            .then(response => response.text())
            .then(data => {
                var parser = new DOMParser();
                var xmlDoc = parser.parseFromString(data, "text/xml");
    
                // Get the chatroom div
                var chatroomDiv = document.getElementById('chatroom');
    
                // Clear the chatroom div
                chatroomDiv.innerHTML = '';
    
                // Loop through each message in the XML data
                var messages = xmlDoc.getElementsByTagName('message');
                for (var i = 0; i < messages.length; i++) {
                    var user = messages[i].getElementsByTagName('user')[0].childNodes[0].nodeValue;
                    var text = messages[i].getElementsByTagName('text')[0].childNodes[0].nodeValue;
                    var timestamp = messages[i].getElementsByTagName('timestamp')[0].childNodes[0].nodeValue;
    
                    // Create a new paragraph for each message and add it to the chatroom div
                    var p = document.createElement('p');
                    p.textContent = timestamp + ' - ' + user + ': ' + text;
                    chatroomDiv.appendChild(p);
                }
            })
            .catch(error => console.error('Error:', error));
    }
    
    // Create a new DOMParser
    var parser = new DOMParser();
    
    // Create a new XML document
    var xmlDoc = parser.parseFromString('<chatroom></chatroom>', 'text/xml');
    
    // Create the first message (welcome message)
    var message = xmlDoc.createElement('message');
    var user = xmlDoc.createElement('user');
    var text = xmlDoc.createElement('text');
    var timestamp = xmlDoc.createElement('timestamp');
    
    user.appendChild(xmlDoc.createTextNode('System'));
    text.appendChild(xmlDoc.createTextNode('Welcome to the new chatroom!'));
    timestamp.appendChild(xmlDoc.createTextNode(new Date().toISOString()));
    
    message.appendChild(user);
    message.appendChild(text);
    message.appendChild(timestamp);
    
    // Add the message to the chatroom
    xmlDoc.getElementsByTagName('chatroom')[0].appendChild(message);
    
    // Serialize the XML document to a string
    var serializer = new XMLSerializer();
    var xmlStr = serializer.serializeToString(xmlDoc);
    
    console.log(xmlStr);
    
    </script>
  
  </body>
</html>
