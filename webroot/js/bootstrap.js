/*!
 * Archivo que contiene por las funciones javascript que se cargan por defecto
 * en todas las páginas del sitio.
 *
 * @package     webroot
 * @subpackage  js
 * @author      JpBaena13
 */

/**
 * Nombre del Proyecto
 */
    var PRJCT_NAME = 'Proveedores'

/*
 * Ruta relativa del directorio webroot del sitio
 */
    var ROOT_URL = (PRJCT_NAME == '') ? '/' : '/' + PRJCT_NAME + '/'

/*
 * Ruta relativa del directorio webroot del sitio
 */
    var WEBROOT_URL = ROOT_URL + 'webroot/'
    
/*
 * Ruta relativa del directorio ajax
 */
    var API = ROOT_URL + 'API/'


 /*
  * Selecciona el lenguaje configurado por el usuario, o por defecto <en_US>
  */    
    chooseLang();

/*
 * Patrones de URL 
 */
    var urlPattern = /(ht|f)tp(s?):\/\/[a-zA-Z0-9-_:/.?,?+?#|%?(?)?&amp;=]+$/gim;
    var comPattern = /^([a-zA-z0-9]+(\.|\-){1})+(com|co|info|net|org|me|mobi|us|biz|ca|mx|tv|ws|ag|am|asia|at|be|br|bz|cc|cn|de|es|eu|fm|fr|gs|in|it|jobs|jp|ms|nl|nu|nz|se|tc|tk|tw|uk|vg|edu|no-ip)$/;
    var youtubePattern = /(http):\/\/(www.youtube.com)[a-zA-Z0-9-_:/.?,?+?#|%?(?)?&amp;=]+$/gim;
    var vimeoPattern = /http:\/\/(www\.)?vimeo.com\/(\d+)($|\/)/;
    
/**
 * Permite cambiar el lenguaje de la página.
 * 
 * @param lang String que determina el lenguaje con el que se cargará la página.
 * 
 * El String lang tiene un formato predeterminado, y debe coincidir con el
 * nombre del archivo que se encuentra en 'webroot/locale/'. p.e.
 * <ul> 
 * <li>es_ES -> Españos de España</li>
 * <li>en_US -> Ingles de Estados Unidos</li>
 * <li>pt_BR -> Portugal de Brasil</li>
 * </ul>
 */
    function chooseLang(lang) {
        if (lang === undefined) {

            lang = 'es_ES';

            if ($.cookie(PRJCT_NAME + '_lang')) {
                lang = $.cookie(PRJCT_NAME + '_lang');

            } else{
                $.cookie(PRJCT_NAME + '_lang', lang, { path: '/', expires: 365 });
            }

            echo("<script type='text/javascript' src='" + WEBROOT_URL + "locale/" + lang + ".js'></script>");

        } else {
            $.cookie(PRJCT_NAME + '_lang', lang, { path: '/', expires: 365 });
        }
    }


/**
 * Esta funcion permite obtener los parametros pasados por URL mediante el metodo GET
 *
 * @param url String que determina la url a la que se le obtendrann los parametros.
 *
 * @return vars Arreglo que contiene los parámetros parasados por URL.
 */
    function getUrlVars(url) {

        var vars = {};

        if (url == undefined) {
            window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m, key, value) {
                vars[key] = value;
            });

        } else {
            url = url.replace(/.*\?(.*?)/, "$1");
            var variables = url.split("&");

            for (var i = 0; i < variables.length; i++) {
                var sep = variables[i].split("=");
                vars[sep[0]] = sep[1]
            }
        }
        
        return vars;
    }

/**
 * Función que permite generar un password aleatoriamente.
 * 
 * @return pass String con el password generado.
 */
    function generatePass() {
        var chars = 'azertyupqsdfghjkmwxcvbn23456789AZERTYUPQSDFGHJKMWXCVBN';
        var pass = '';
        for(var i = 0; i < 10; i++) {
            var wpos = Math.round(Math.random()*chars.length);
            pass += chars.substring(wpos,wpos+1);
        }
        return pass;
    }
    
/**
 * Permite imprimir en el 'document' de la página
 * 
 * @param str String que será impreso en el 'document' de la página.
 */
    function echo(str) {
        document.write(str);
    }

/**
 * Función que permite detener la ejecución de la aplicacion en el hilo actual.
 * 
 * @param milliseconds int que determina el tiempo que se detendra la ejecución.
 */
    function sleep(milliseconds) {
        var start = new Date().getTime();
        for (var i = 0; i < 1e7; i++) {
            if ((new Date().getTime() - start) > milliseconds){
                break;
            }
        }
    }
    
/**
 * Esta funcion elimina código html de una cadena
 * 
 * @param txt que determina la cadena a la que se le elminara el código html
 * 
 * @return String con la cadena sin código html
 */
    function stripHTML(txt) {
        return txt.replace(/<[^>]+>/g,'');
    }
    
/**
 * Esta funcion modifica código html para que no sea interpretado por el cliente
 * 
 * @param txt que determina la cadena a modificar
 * 
 * @return String con la cadena con código html no interpretado
 */
    function withoutIterpretHTML(txt) {
        return txt.replace('<','&lt;');
    }

/**
 * Funcion para reemplazar los espacios multiples entre palabras por un solo espacio
 * 
 * @param txt que determina la cadena a modificar
 * 
 * @return String con la cadena modificada
 */
    function oneSpace(txt){
        return txt.replace(/ +/g, " "); 
    }
    
/**
 * Permite determinar si el string pasado por parámetro es una URL
 * 
 * @param url
 *        cadena de caracteres a validar
 *        
 *  @return true o false dependiendo de si la cadena especificada corresponde a una URL
 */        
    function isURL(url) {
        var URL_PATTERN = /^((ht|f)tps?:\/\/)?(www\.)?[\w\/]+[\/]+[\D\.\/\?\=]*([\S\=\&]*)?$/
        return URL_PATTERN.test(url)
        
    }
    
/**
 * Permite saber si el elemento especificado existe en el arreglo unidimensional
 * 
 * @param array 
 *        Arreglo donde se buscará el elemento especificado
 *  
 * @param element
 *        Elemento a buscar en el arreglo
 *        
 * @return true si el elemento existe, de lo contrario false.
 */
    function existElementInArray(array, element) {
        for (var i = 0; i < array.length; i++) {
            if (array[i] == element)
                return true
        }
    
        return false
    }
    
/**
 * Retonar la fecha especificada en formtato YYYY-MM-DD
 *
 * @param date
 *        Fecha a convertir
 *        
 * @return Fecha en Formato YYYY-MM-DD
 */
    function getDate(date) {

        if (date == undefined)
            date = new Date()

        var y = date.getFullYear()
        var m = date.getMonth() + 1
        var d = date.getDate();

        if (date.getMonth() < 9)
            m = '0' + m

        if (date.getDate() < 10)
            d = '0' + d

        return y + '-' + m + '-' + d
    }

/**
 * Retonar la hora especificada en formtato HH:MM:SS
 * 
 * @param time
 *        Fecha y Hora actual
 *        
 * @return String con la hora actual en formato HH:MM:SS
 */
    function getTime(time) {

        if (time == undefined)
            time = new Date()
        
        var h = time.getHours()
        var m = time.getMinutes()
        var s = time.getSeconds();

        if (time.getHours() < 10)
            h = '0' + h

        if (time.getMinutes() < 10)
            m = '0' + m

        if (time.getSeconds() < 10)
            s = '0' + s

        return h + ':' + m + ':' + s
    }

/**
 * Retorna un grupo de <option> con los valores desde el 'init'
 * especifiado hsata el 'end' especifivado.
 * 
 * @param  int init Valor inicial del <option>
 * @param  int end  Valor final del <option>
 * @param  int selcted  Valor seleccionado por defecto
 * 
 * @return string   Grupo de elementos <option>
 */
    function getTimeOptions(init, end, selected) {
        var string = ''
            ,init = init || 0
            ,end = end || 59;                   

        for (var i = init; i <= end; i++ ) {
            var n = '' + i
                ,idx = '';

            if ( i < 10)
                n = '0' + i;

            if (i == selected)
                idx = 'selected';

            string = string + '<option value="' + n + '"' + idx + '>' + n + '</option>';
        }

        return string;
    }

/**
 * Permite obtener el número Hexadecimal de un color en rgb().
 * 
 * @param  rgb 
 *         valor del color en rgb
 * 
 * @return string valor del color en hexadecimal
 */
    function rgb2hex(rgb) {
        rgb = rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);

        function hex(x) {
            return ("0" + parseInt(x).toString(16)).slice(-2);
        }

        return "" + hex(rgb[1]) + hex(rgb[2]) + hex(rgb[3]);
    }

/**
 * Retorna arreglo con el valor RGB del hexadecimal especificado
 *
 * @param hex Valor hexadecimal del color
 *
 * @return Object objecto con los valore R-G-B del color
 */
    function hex2rgb(hex) {
        var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        return result ? {
            r: parseInt(result[1], 16),
            g: parseInt(result[2], 16),
            b: parseInt(result[3], 16)
        } : null;
    }

/**
 * Esta función permite la validación de datos
 * @param  string data Datos retornados por la función ajax ejectuada
 */
    function validateData(data) {
        if (data.error != undefined) {
            var title = eval('i18n.err' + data.error.code)
                ,content = data.error.msg || eval('i18n.err' + data.error.code + 'Msg');
            
            $.untInputWin({
                title: title,
                content: content,
                'maxWidth': '400px',
                clickAccept: function() {
                    if (data.error.code == '401')
                        location.href = ROOT_URL + 'Login?uri=' + 
                                        encodeURIComponent(location.pathname + location.hash);
                }
            });

            return false;
        }
    }

/**
 * Convierte los salto de lína del texto especificado en etiquetas <br>
 * 
 * @param  string  str Texto a convertir
 * 
 * @return string Texto convertido
 */
    function nl2br(str) {
        return (str + '').replace(/([^>\r\n]?)(\r\n|\n\r|\r|\n)/g, '$1' + '<br>' + '$2');
    }

    /**
     * Retorna un subcadena con cantidad de caracteres menor o igual 
     * la cadena especificada. Si la cadena original supera la 
     * cantidad mínimo, se recorta incluyendo tre puntos suspesivoc
     *
     * @param string text Cadena de caracteres a recortar.
     * @param int length Cantidad máxima de caracteres.
     * 
     * @return string Cadena recortada.
     * 
     */
    function clipText(text, length) {
        if (text.length > length ) {
            text = text.substr(0, length - 3) + '...';
        }

        return text;
    }


/**
 * Función que es auto-ejecutada en todas las páginas del sitio.
 * 
 * (Poner acá los script de uso general en todo el sitio)
 */
    $(function(){

    /*
     * Select para cambio de lenguaje (i18n)
     */
        $('#language').change(function(){
            chooseLang( this.value );
            location.reload();
        });

    /**
     * Aplicando QTip a todos los componentes que contengan esta clase.
     */
        $('.qtipActive').qtip();

    /**
     * Sobre-escribiendo el método <error> de $.ajax
     */
        $(document).ajaxError( function (e, jqxhr, settings, exception) {
            var data = JSON.parse(jqxhr.responseText);
            validateData(data);
        });
    });