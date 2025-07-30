# 🔐 PrestaShop 8 – Admin Password Reset CLI

Un script PHP en ligne de commande permettant de **réinitialiser le mot de passe d’un compte administrateur PrestaShop 8**, sans interface web ni dépendance complexe.

---

## 🚀 Fonctionnalités

- ✅ Exécution **100% en ligne de commande (CLI)**
- 🔐 Saisie **sécurisée** du mot de passe (masqué à l’écran)
- 🧠 Utilisation de `Tools::encrypt()` pour respecter le hachage natif PrestaShop
- 💾 Mise à jour directe dans la base de données via SQL
- 📦 Aucune dépendance à Symfony Container ni à Apache

---

## 🛠️ Prérequis

- PrestaShop **8.x**
- PHP CLI 7.4 à 8.1 recommandé
- Accès terminal/SSH sur le serveur hébergeant PrestaShop

---

## ⚙️ Installation

1. **Téléchargez** ou clonez le fichier `reset_admin_password.php` dans la racine de votre PrestaShop :
   ```bash
   cd /var/www/html/
   wget https://raw.githubusercontent.com/devkort/prestashop-reset-admin-password/main/reset_admin_password.php
