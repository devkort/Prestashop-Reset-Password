#!/usr/bin/php
<?php
require_once __DIR__ . '/config/config.inc.php';
require_once __DIR__ . '/vendor/autoload.php';

function prompt($text, $secure = false) {
    if (!$secure) {
        echo $text;
        return trim(fgets(STDIN));
    } else {
        if (strncasecmp(PHP_OS, 'WIN', 3) === 0) {

            echo $text;
            return trim(fgets(STDIN));
        } else {

            echo $text;
            system('stty -echo');
            $input = trim(fgets(STDIN));
            system('stty echo');
            echo "\n";
            return $input;
        }
    }
}

$email = prompt("📧 Entrez l'email de l'administrateur : ");
$newPassword = prompt("🔐 Nouveau mot de passe : ", true);

$idEmployee = (int) Db::getInstance()->getValue(
    'SELECT id_employee FROM '._DB_PREFIX_.'employee WHERE email = \''.pSQL($email).'\''
);

if (!$idEmployee) {
    echo "❌ Aucun compte admin trouvé pour l'email : $email\n";
    exit(1);
}

$hashed = Tools::encrypt($newPassword);

$ok = Db::getInstance()->execute(
    'UPDATE '._DB_PREFIX_.'employee SET passwd = \''.pSQL($hashed).'\' WHERE id_employee = '.(int)$idEmployee
);

if ($ok) {
    echo "✅ Mot de passe mis à jour avec succès pour : $email\n";
} else {
    echo "❌ Erreur SQL lors de la mise à jour.\n";
}
