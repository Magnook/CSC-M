// db.js
const mysql = require('mysql');

const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',      // usuário MySQL
  password: 'Mag.137580',      // senha MySQL
  database: 'csc_db' // O nome do banco que foi criado
});

connection.connect((err) => {
  if (err) throw err;
  console.log('Conectado ao banco de dados MySQL!');
});

module.exports = connection;
