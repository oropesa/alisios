Alisios Wordpress Theme
=======

[VERSIÓN EN ESPAÑOL]

Alisios es un Theme de Wordpress gratuito, preparado para ser la base de Themes hijos.

Mantener un theme de Wordpress es sencillo, pero mantener muchos no. El mantenimiento de varios themes es caótico cuando quieres actualizar una funcionalidad o corregir un fallo de seguridad, ya que se tiene que copiar y pegar mucho código y tocar muchos archivos que se han ido modificando y adaptando independientemente para acabar generando themes diferentes.

Por eso he creado Alisios, un theme que será el núcleo de otros themes, para que cuando se quiera crear un nuevo Theme venga incorporado con todo lo necesario.

Un theme debe suplir necesidades más allá del diseño. Es más, la parte visual es la razón de mayor peso de crear nuevos themes. Por eso el estilo es lo que se va a delegar al theme hijo y el theme Alisios tendrá otras prioridades, otras características.

# Características

## Estructura escalar basada en hooks. `Para desarrolladores`

La estructura base es siempre la misma: `header` `content` `footer`. Para que los themes hijos puedan tener una estructura personalizada se utilizarán los alisios-hooks (los cuáles son compatibles con el 'Theme Hook Alliance').

De este modo todos los componentes se añaden mediante hooks, de tal manera que se puede controlar su adición, eliminación y prioridad de cada componente, gestionando así la estructura final de cada web.

## Theme Multilenguaje. `Para desarrolladores | traductores`

Si un theme lo quiere usar un español, un inglés y un alemán es mejor no tener 3 themes distintos. Hay textos incorporados dentro del código del theme que no se podrán editar en el panel de administración.

**¿Cómo traducir los textos?**
Dentro del theme está la carpeta languages/ que contiene los archivos .po que sirven para buscar y traducir todos los textos del theme. Los archivos .po son para las personas, que se compilan a .mo, que son para Wordpress.

Si el theme no está traducido en tu idioma tan solo crea un .po con la extensión de tu idioma en la carpeta languages/. También puedes enviarme la traducción a carlos@oropensando.com para compartir tu esfuerzo. Todo el mundo, y yo sobretodo, te lo agradeceremos.

## Base de diseño con Bootstrap y Font-Awesome. `Para desarrolladores`

Gracias a [Bootstrap](http://getbootstrap.com/getting-started/) y [Font-Awesome](http://fortawesome.github.io/Font-Awesome/) se consiguen tener unas premisas de diseño para poder tener un diseño responsivo estable y una colección que iconos que nos facilitará el UX.

Para tener un diseño de estos frameworks te recomiendo mirar la documentación de cada uno.

## Conexión con herramientas SEO. `Para SEO | usuarios`

Para hacerle un seguimiento a la página es mejor usar herramientas de terceros, como Google Analytics o Alexa.

Conectar tu página con una herramienta SEO es tan sencillo como añadir una etiqueta meta dentro del `head`. Las herramientas que Alisios tiene incorporadas son:

[**Google Webmaster Tools**](https://www.google.com/webmasters/verification/)

[**Google Analytics**](https://www.google.com/analytics/web/)

[**Bing Webmaster Tools**](http://www.bing.com/toolbox/webmaster/#/Dashboard/)

[**Alexa ID Verification**](http://www.alexa.com/siteowners/claim)

[**Pinterest**](https://help.pinterest.com/es/articles/verify-your-website)

**¿Cómo hacer la conexión?**
En la zona de administración, ir a Herramientas > Conexión SEO. En este panel están listadas las herramientas y solo tendrás que introducir el ID de verificación de cada herramienta.

*Detalle: Google Analytics no es colocar una etiqueta en el `head`, si no un código Javascript al final de la página.*

## Tags de Redes Sociales y SEO. `Para SEO | usuarios`

Una mejora de SEO es añadir ciertos metadatos para que las redes sociales reconozcan mejor nuestra página. De este modo les es posible rastrear mejor nuestro contenido y así mostrarla con un mejor diseño.

Los tags para las redes sociales que Alisios tiene incorporados son:

**Title** (70 máx)

**Description** (155 máx)

**rel=author** y **rel=publisher** (Google+)

**Schema** (Google+)

- name, description, image

**Twitter**

- card (summary, summary with large image), site, title, description, creator, domain, image:src

**Open Graph** (Facebook)

- title, type (website, article), url, image, description, site_name, locale, fb:app_id, article:author, article:publisher, article:published_time, article:modified_time, article:section, article:tag

**¿Cómo enlazar a mis redes sociales?**
En la zona de administración, ir a Social. En este panel se mostrarán los campos relativos a las redes sociales.


## Archivos SEO. `Para SEO | usuarios`

Los archivos robots.txt y .htaccess son archivos que para editarlos acabamos recurriendo al bloc de notas. Tenerlos en nuestra interfaz de administración es una manera muy cómoda de verlos y editarlos.

**¿Cómo editar los archivos?**
En la zona de administración, ir a Ajustes > Archivos SEO. En este panel se mostrarán los archivos con su contenido a editar.

# Futuras Características

Estas características son funcionalidades que todavía no se han implementado pero que se tiene intención de hacerlo.

## Shortcodes incrustados

Los shortcodes (códigos cortos) te permiten incrustar archivos multimedia de cualquier lugar en tu sitio de una forma sencilla y segura directamente en el editor.

Los shortcodes disponibles serán: [dailymotion], [googlemaps], [soundcloud], [twitter], [vimeo], [vine], [youtube].

## Widgets

**Widget de Redes Sociales**: Muestra los iconos que enlazan a sus redes sociales.

**Widget de Twitter**: Muestra sus últimos tweets en la barra lateral de su tema.

**Widget "Facebook Like Box"**: Muestra el cuadro de Facebook en una barra lateral del tema.

**Widget de Google+**: Muestra su perfil de Google+ con el número de persona que le siguen.

**Widget de imágenes**: Permite agregar fácilmente imágenes en la barra lateral de su tema.

## Publicación automática en redes sociales

AL publicar una entrada se tomará automáticamente el contenido publicado y se compartirá al instante con las redes sociales conectadas.

## Carrusel

Gestiona carruseles de imágenes

## Entradas relacionadas

Muestras entradas relacionadas en cada entrada según categorías y tags.

## Enlaces de Compartir en redes sociales

Debajo de cada entrada se facilitan las distintas redes sociales para compartir