<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define('DB_NAME', 'btrigalez');

/** Utilisateur de la base de données MySQL. */
define('DB_USER', 'btrigalez');

/** Mot de passe de la base de données MySQL. */
define('DB_PASSWORD', 'Y*A89im');

/** Adresse de l’hébergement MySQL. */
define('DB_HOST', 'localhost');

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define('DB_CHARSET', 'utf8');

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'g-T%ngyCaVtb/6lUnS-9)eK&#||B+_yN/rHeyakil7H(~OwhmMP4-:yrWFv _j]n');
define('SECURE_AUTH_KEY', 'B;_FhJ J`EIKEf~FeTWJM@Q8kTby@C+aQ&?+?Bz+?d+%;x[Sw5U&/hN,2R1GEP%_');
define('LOGGED_IN_KEY', 'e dBnu%KCvt,Rac=-k1zN*AlYT/U>L|ipV~S5U$HeqC-&x:QUp2WGd(|wWlVV8xr');
define('NONCE_KEY', 'Nx@-|y-bi_p-W-=rH; /X9}@$-C9bIvz:3{1y^kA)8++%:ofNC*9=4y-a-_maVPq');
define('AUTH_SALT', '$q$bz|&b<5KqUFR+{JaD^M+Hie0[] <$r}*bCG7[IN((oPz^OTT/bi/29QWsZz@Z');
define('SECURE_AUTH_SALT', 'pp/_EjYS,Lc2Yd|GEzk$qzh/[DH4 33G$AL*=FAL/HZP*^2ts#g%=w;P,%._@]n6');
define('LOGGED_IN_SALT', 'UmacaD]KQ0+k:Lk|C=xBXR*xfH)iw/Lxd8]h={>h8(f}N]A|@-MfSLFs.DHkF7K7');
define('NONCE_SALT', '+q,u*f2.+DOEz[X9*to2anIEoQYu34_J+ULeBY_)CcWrA%bt+obRRzO9M~hq2EP$');
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix  = 'rurhart_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);


 /** Désactivation des révisions d'articles */
define('WP_POST_REVISIONS', 0);

 /** Désactivation de l'éditeur de thème et d'extension */
define('DISALLOW_FILE_EDIT', true);

 /** Intervalle des sauvegardes automatique */
define('AUTOSAVE_INTERVAL', 7200);

 /** On augmente la mémoire limite */
define('WP_MEMORY_LIMIT', '96M');

/* C’est tout, ne touchez pas à ce qui suit ! */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');