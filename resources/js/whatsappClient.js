const { Client } = require('whatsapp-web.js');
const qrcode = require('qrcode-terminal');
const client = new Client();

client.on('qr', (qr) => {
    // Genera y muestra el código QR en la terminal para escanearlo con el móvil.
    qrcode.generate(qr, { small: true });
});

client.on('ready', () => {
    console.log('WhatsApp Web Client está listo!');
});

client.initialize();

module.exports = client;
// Función para enviar mensajes de WhatsApp
function sendWhatsAppMessage(phoneNumber, message) {
    client.sendMessage(`${phoneNumber}@c.us`, message)
        .then(response => {
            console.log('Mensaje enviado a:', phoneNumber);
        })
        .catch(err => {
            console.error('Error al enviar el mensaje:', err);
        });
}

module.exports = { sendWhatsAppMessage };
