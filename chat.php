<!DOCTYPE html>
<head>
  
</head>
<html>
<body>

<h2>Chatroom</h2>

<div id="chatroom"></div>

<script>

const fs = require('fs');

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
              read_write_chatroom(nom_fichier2);
            }
        });
    } else {
        console.log('The file exists.');
        read_write_chatroom(nom_fichier1);
    }
  });
}

function read_write_chatroom(namefile_xml){

}


// This is your XML data
var xmlData = 

// Parse the XML data
var parser = new DOMParser();
var xmlDoc = parser.parseFromString(xmlData, "text/xml");

// Get the chatroom div
var chatroomDiv = document.getElementById('chatroom');

// Loop through each message in the XML data
var messages = xmlDoc.getElementsByTagName('message');
for (var i = 0; i < messages.length; i++) {
  var user = messages[i].getElementsByTagName('user')[0].childNodes[0].nodeValue;
  var text = messages[i].getElementsByTagName('text')[0].childNodes[0].nodeValue;

  // Create a new paragraph for each message and add it to the chatroom div
  var p = document.createElement('p');
  p.textContent = user + ': ' + text;
  chatroomDiv.appendChild(p);
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
