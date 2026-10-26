# Despliegue Automatizado con Ansible: LAMP, Samba y VSFTPD

Proyecto Ansible para el aprovisionamiento automatizado de servicios en **openSUSE Leap 15.6 y 16.0**.

---

## 🚀 Servicios y Roles Incluidos

| Rol | Componentes / Tareas Principales |
|---|---|
| [`apache`](file:///roles/apache) | Instala Apache 2, PHP 8 y extensiones; habilita módulo `php8` (`a2enmod php8`); despliega página de prueba en `/srv/www/htdocs/index.php`. |
| [`mariadb`](file:///roles/mariadb) | Instala MariaDB y conector `python3-PyMySQL`; arranca servicio; inicializa root de forma segura; crea `/root/.my.cnf`; elimina usuarios anónimos y base `test`; crea base de datos y usuario de aplicación. |
| [`phpmyadmin`](file:///roles/phpmyadmin) | Instala `phpMyAdmin` y `phpMyAdmin-apache`; genera clave secreta `blowfish_secret`; configura alias en `/etc/apache2/conf.d/phpMyAdmin.conf`. |
| [`samba`](file:///roles/samba) | Instala Samba; crea usuario y grupo de sistema; crea directorio compartido (`/srv/samba/compartido`); crea usuario Samba con `smbpasswd`; configura `/etc/samba/smb.conf` con `create mask` y `directory mask`. |
| [`vsftpd`](file:///roles/vsftpd) | Instala y configura VSFTPD con chroot local y rangos pasivos; inicia servicio `vsftpd`. |
| [`postgresql`](file:///roles/postgresql) | Instala, inicializa y configura PostgreSQL. |

---

## ✅ Requisitos y Pasos para Ejecutar el Proyecto

### Requisitos

- **Máquina master (nodo de control Ansible)**: Linux con `ansible` instalado y conectividad de red hacia los clientes.
- **`sshpass`** en la máquina master: necesario para que Ansible se conecte por contraseña SSH (`ansible_password` definida en Ansible Vault o `--ask-pass`).
- **Máquinas cliente (nodos administrados)**: openSUSE Leap 15.6 / 16.0, accesibles por SSH con el usuario `root` (ver IPs en el archivo [`hosts`](file:///hosts)).
- **Servidor SSH** instalado y habilitado en los clientes, con login de `root` permitido.
- **Firewall desactivado** en las máquinas cliente y server (entorno de laboratorio).
- **Archivo de credenciales** `group_vars/servidor/vault.yml` creado a partir de `vault.yml.example`.

### Paso 1: Preparar las máquinas cliente

Instalar el servidor SSH:
```bash
zypper -n install openssh-server
```

Instalar el requerimiento para Vault (autenticación por contraseña; obligatorio en la máquina master):
```bash
zypper install sshpass
```

Permitir el login de `root` por SSH:
```bash
cd /etc/ssh/sshd_config.d/
vim 90-custom.conf
```

Añadir este contenido al archivo y guardarlo:
```text
PermitRootLogin yes
```

Reiniciar y habilitar el servicio SSH:
```bash
systemctl restart sshd
systemctl enable --now sshd
```

### Paso 2: Desactivar el firewall (máquinas cliente y server)

```bash
systemctl disable --now firewalld
```

### Paso 3: Verificar la conexión desde la máquina master

Desde la máquina master Ansible, conectarse por SSH a la IP de cada máquina cliente (acepta la huella del host y valida el acceso):
```bash
ssh root@192.168.1.68
```

### Paso 4: Ejecutar el playbook

```bash
ansible-playbook playbook.yml --ask-vault-pass
ingresar el password: mundolibre
```

---



