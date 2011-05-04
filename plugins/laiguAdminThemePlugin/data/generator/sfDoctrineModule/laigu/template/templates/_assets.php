[?php use_stylesheet('<?php echo sfConfig::get('app_laigu_admin_theme_plugin_web_dir_extjs').'/resources/css/ext-all.css' ?>', 'first') ?]
[?php use_javascript('<?php echo sfConfig::get('app_laigu_admin_theme_plugin_web_dir_extjs').'/adapter/ext/ext-base.js' ?>', 'first') ?]
[?php use_javascript('<?php echo sfConfig::get('app_laigu_admin_theme_plugin_web_dir_extjs').'/ext-all.js' ?>', 'first') ?]

<?php if (isset($this->params['css']) && ($this->params['css'] !== false)): ?> 
[?php use_stylesheet('<?php echo $this->params['css'] ?>', 'first') ?] 
<?php elseif(!isset($this->params['css'])): ?> 
[?php use_stylesheet('<?php echo sfConfig::get('sf_admin_module_web_dir').'/css/global.css' ?>', 'first') ?] 
[?php use_stylesheet('<?php echo sfConfig::get('sf_admin_module_web_dir').'/css/default.css' ?>', 'first') ?] 
<?php endif; ?>


[?php use_stylesheet('/laiguAdminThemePlugin/css/laiguAdminTheme.css', 'first') ?]

<script type="text/javascript">
  /* <![CDATA[ */

  if(typeof window.laiguLoadAjax != 'function') // js functions and history is only loaded once, at first GET 
  {
    Ext.History.init();

    // handle this change event in order to restore the UI to the appropriate history state
    Ext.History.on('change', function(token)
    {
      if(token)
      {
        // back/forward to url in the history
        token = Ext.util.base64.decode(token);
        var parts = token.split("|");
        var el = Ext.get(parts[1]);
        Ext.get(parts[1]).load({url: parts[0], scripts: true});
      }
      else
      {
        // come back to the first url
        document.location.href = laigu_first_url;
      }
    });

    // first url (this allows to come back to the first url)
    var laigu_first_url = document.location.href;

    // load url using ajax and save token in the history
    laiguLoadAjax = function(url, el_target)
    {
      // add token to history
      Ext.History.suspendEvents();
      Ext.History.add(Ext.util.base64.encode(url+"|"+Ext.get(el_target).parent("div.laigu").getAttribute("id")));
      (function() {Ext.History.resumeEvents();}).defer(150);

      // load url using ajax
      Ext.get(el_target).parent("div.laigu").load({url: url, scripts: true});
    }

    // submit using ajax
    laiguSubmitAjax = function(url, el_target)
    {
      // no token to history

      // if you use tinyMCE this code is necessary to copy tinyMCE editor content to our textarea before submit
      if(typeof tinyMCE == 'object')
      {
        tinyMCE.each(tinyMCE.editors, function(v, i) {
          document.getElementById(v.id).value = v.getBody().innerHTML;
        });
      }

      // submit using ajax
      Ext.get(el_target).parent("div.laigu").load({url: url, scripts: true, form: el_target});
    }

    Ext.util.base64 = {

      base64s : "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/",

      encode: function(decStr){
        if (typeof btoa === 'function') {
          return btoa(decStr);
        }
        var base64s = this.base64s;
        var bits;
        var dual;
        var i = 0;
        var encOut = "";
        while(decStr.length >= i + 3){
          bits = (decStr.charCodeAt(i++) & 0xff) <<16 | (decStr.charCodeAt(i++) & 0xff) <<8 | decStr.charCodeAt(i++) & 0xff;
          encOut += base64s.charAt((bits & 0x00fc0000) >>18) + base64s.charAt((bits & 0x0003f000) >>12) + base64s.charAt((bits & 0x00000fc0) >> 6) + base64s.charAt((bits & 0x0000003f));
        }
        if(decStr.length -i > 0 && decStr.length -i < 3){
          dual = Boolean(decStr.length -i -1);
          bits = ((decStr.charCodeAt(i++) & 0xff) <<16) |    (dual ? (decStr.charCodeAt(i) & 0xff) <<8 : 0);
          encOut += base64s.charAt((bits & 0x00fc0000) >>18) + base64s.charAt((bits & 0x0003f000) >>12) + (dual ? base64s.charAt((bits & 0x00000fc0) >>6) : '=') + '=';
        }
        return(encOut);
      },

      decode: function(encStr){
        if (typeof atob === 'function') {
          return atob(encStr);
        }
        var base64s = this.base64s;
        var bits;
        var decOut = "";
        var i = 0;
        for(; i<encStr.length; i += 4){
          bits = (base64s.indexOf(encStr.charAt(i)) & 0xff) <<18 | (base64s.indexOf(encStr.charAt(i +1)) & 0xff) <<12 | (base64s.indexOf(encStr.charAt(i +2)) & 0xff) << 6 | base64s.indexOf(encStr.charAt(i +3)) & 0xff;
          decOut += String.fromCharCode((bits & 0xff0000) >>16, (bits & 0xff00) >>8, bits & 0xff);
        }
        if(encStr.charCodeAt(i -2) == 61){
          return(decOut.substring(0, decOut.length -2));
        }
        else if(encStr.charCodeAt(i -1) == 61){
          return(decOut.substring(0, decOut.length -1));
        }
        else {
          return(decOut);
        }
      }

    };
  }



  // add event listener to all anchors with class laigu_ajax
  Ext.select('a.laigu_ajax').on('click', function(ev, t) {
    // if is an image
    if (t.tagName == "IMG") t = t.parentNode;
    ev.stopPropagation(); // Cancels bubbling of the event
    ev.stopEvent() // preventDefault + stopPropagation
    laiguLoadAjax(t.href, t);
  });

  // replace regular submit to all anchors that has special behaviour for example (confirm)
  Ext.select('a.laigu_ajax_method_javascript_function').each(function(e){
    var onclick_content = e.getAttribute("onclick");
    onclick_content = onclick_content.toString();
    onclick_content = onclick_content.replace("f\.submit()", "laiguSubmitAjax(f.action, f)");
    e.set({onclick: onclick_content});
  });

  // our form serializer gets all form elements and submit them including input submit with names!
  // these code puts name attribute to onclick event...
  Ext.select('input.laigu_ajax[type=submit]').each(function(e){
    var name = e.getAttribute("name");
    if(name) e.set({name: '', onclick: "this.name='"+name+"'"});
  });

  // add event listener to all input submit buttons
  Ext.select('input.laigu_ajax[type=submit]').on('click', function(ev, t) {
    ev.stopPropagation(); // Cancels bubbling of the event
    ev.stopEvent() // preventDefault + stopPropagation
    laiguSubmitAjax(t.form.action, t.form);
  });

  // error message fired if an error HTTP status was returned from the server
  Ext.Ajax.on('requestexception', function(conn, resp, opt) {
    error = new Ext.Window({ title: 'Error', html: resp.responseText, width:640, height: 480, autoScroll: true});
    error.show();
  });

  /* ]]> */
</script>

<!-- Fields required for history management -->
<form id="history-form" class="x-hidden">
  <input type="hidden" id="x-history-field" />
  <iframe id="x-history-frame"></iframe>
</form>
