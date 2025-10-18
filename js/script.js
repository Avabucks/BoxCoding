var Base64 = { _keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=", encode: function (e) { var t = ""; var n, r, i, s, o, u, a; var f = 0; e = Base64._utf8_encode(e); while (f < e.length) { n = e.charCodeAt(f++); r = e.charCodeAt(f++); i = e.charCodeAt(f++); s = n >> 2; o = (n & 3) << 4 | r >> 4; u = (r & 15) << 2 | i >> 6; a = i & 63; if (isNaN(r)) { u = a = 64 } else if (isNaN(i)) { a = 64 } t = t + this._keyStr.charAt(s) + this._keyStr.charAt(o) + this._keyStr.charAt(u) + this._keyStr.charAt(a) } return t }, decode: function (e) { var t = ""; var n, r, i; var s, o, u, a; var f = 0; e = e.replace(/[^A-Za-z0-9\+\/\=]/g, ""); while (f < e.length) { s = this._keyStr.indexOf(e.charAt(f++)); o = this._keyStr.indexOf(e.charAt(f++)); u = this._keyStr.indexOf(e.charAt(f++)); a = this._keyStr.indexOf(e.charAt(f++)); n = s << 2 | o >> 4; r = (o & 15) << 4 | u >> 2; i = (u & 3) << 6 | a; t = t + String.fromCharCode(n); if (u != 64) { t = t + String.fromCharCode(r) } if (a != 64) { t = t + String.fromCharCode(i) } } t = Base64._utf8_decode(t); return t }, _utf8_encode: function (e) { e = e.replace(/\r\n/g, "\n"); var t = ""; for (var n = 0; n < e.length; n++) { var r = e.charCodeAt(n); if (r < 128) { t += String.fromCharCode(r) } else if (r > 127 && r < 2048) { t += String.fromCharCode(r >> 6 | 192); t += String.fromCharCode(r & 63 | 128) } else { t += String.fromCharCode(r >> 12 | 224); t += String.fromCharCode(r >> 6 & 63 | 128); t += String.fromCharCode(r & 63 | 128) } } return t }, _utf8_decode: function (e) { var t = ""; var n = 0; var r = c1 = c2 = 0; while (n < e.length) { r = e.charCodeAt(n); if (r < 128) { t += String.fromCharCode(r); n++ } else if (r > 191 && r < 224) { c2 = e.charCodeAt(n + 1); t += String.fromCharCode((r & 31) << 6 | c2 & 63); n += 2 } else { c2 = e.charCodeAt(n + 1); c3 = e.charCodeAt(n + 2); t += String.fromCharCode((r & 15) << 12 | (c2 & 63) << 6 | c3 & 63); n += 3 } } return t } }

window.addEventListener('load', (event) => {

    document.querySelectorAll(".close-popup").forEach((el, index) => {
        el.addEventListener("click", function (e) {
            document.querySelectorAll(".popup").forEach((popup, index) => {
                popup.classList.add("hidden");
            });
        });
    });

    var copyDiv = document.createElement("div");
    copyDiv.classList.add("copyCode");
    copyDiv.innerHTML = "<i class='bx bx-copy' ></i>Clik to copy"
    document.querySelectorAll(".user-page .snippetCode").forEach((el, index) => {
      el.addEventListener("mouseover", function (e) {
        e.currentTarget.appendChild(copyDiv);
      });
      el.addEventListener("mouseout", function (e) {
        e.currentTarget.querySelector(".copyCode").remove();
        copyDiv = document.createElement("div");
        copyDiv.classList.add("copyCode");
        copyDiv.innerHTML = "<i class='bx bx-copy' ></i>Click to copy"
      });
      el.addEventListener("click", function (e) {
        e.currentTarget.querySelector(".copyCode").remove();
        navigator.clipboard.writeText(e.currentTarget.innerText); //copy code
        showTimerAlert("Code copied to clipboard.");
      });
    });

    document.querySelectorAll(".device-views .bx").forEach((el, index) => {
      el.addEventListener("click", function (e) {
        e.cancelBubble = true;
        document.querySelectorAll(".device-views [data-id='" + e.target.dataset.id + "']").forEach((elem, index) => {
          elem.classList.remove("selected");
        });
        e.target.classList.add("selected");
        if (e.target.classList.contains("desktop")) {
          e.target.parentNode.parentNode.parentNode.parentNode.querySelector(".preview iframe").classList.remove("resizable-iframe");
          e.target.parentNode.parentNode.parentNode.parentNode.querySelector(".preview iframe").removeAttribute('style');
        } else {
          e.target.parentNode.parentNode.parentNode.parentNode.querySelector(".preview iframe").classList.add("resizable-iframe");
          e.target.parentNode.parentNode.parentNode.parentNode.querySelector(".preview iframe").style.width = "330px";
          e.target.parentNode.parentNode.parentNode.parentNode.querySelector(".preview iframe").style.minWidth = "330px";
          e.target.parentNode.parentNode.parentNode.parentNode.querySelector(".preview iframe").style.maxWidth = "100%";
        }
      });
    });

  // Append the jquery script
  var script = document.createElement("script");
  script.src =
    "https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js";
  document.head.appendChild(script);

    // LIKES
    document.querySelectorAll(".add-like").forEach((el, index) => {
      el.addEventListener("click", function (e) {

        if (document.cookie.indexOf('login_user=') == "-1") {
          location.href = "/login";
          return;
        }

        e.cancelBubble = true;
        $.ajax({
          url: '/likes',
          type: 'POST',
          data: {
            id_component: e.target.dataset.id
          },

          success: function (data) {
            e.target.classList.toggle("like-selected");
            e.target.children[0].classList.toggle("bx-heart");
            e.target.children[0].classList.toggle("bxs-heart");
            e.target.children[1].innerText = data;
          }

        });
      });
    });


  try {
    document.querySelector(".more-menu").classList.remove("hidden-menu");
    var menuWidth = document.querySelector(".more-menu").clientWidth;
    document.querySelector(".more-menu").classList.add("hidden-menu");
    document.querySelectorAll(".more-butt").forEach((el, index) => {
      el.addEventListener("click", function (e) {
        document.querySelector(".more-menu").classList.toggle("hidden-menu");
        document.querySelector(".more-menu").style.left = e.target.offsetLeft - menuWidth + e.target.clientWidth + "px";
        document.querySelector(".more-menu").style.top = e.target.offsetTop + e.target.clientHeight + 10 + "px";
      });
    });
  } catch {}

  var clone = document.querySelector(".preview iframe").cloneNode(true);
  var container = document.createElement("div");
  container.classList.add("fullscreen");
  container.classList.add("hidden");
  container.appendChild(clone);
  container.innerHTML += "<button class='butt butt-outline' onclick='closeFullscreen();'><i class='bx bx-exit-fullscreen' ></i></button>";
  document.querySelector("body").appendChild(container);

    document.querySelectorAll(".fullscreen-butt").forEach((el, index) => {
      el.addEventListener("click", function (e) {        
        document.querySelector(".transition").classList.add("start");
        setTimeout(function () {
          document.querySelector("body").querySelector(".fullscreen").classList.remove("hidden");
          setTimeout(function () {
            document.querySelector(".transition").classList.remove("start");
            document.querySelector(".transition").classList.add("stop");
              setTimeout(function () {
                document.querySelector(".transition").classList.remove("stop");
              }, 300);
          }, 100);
        }, 300);
        
      });
    });

});

function closeFullscreen() {
  document.querySelector(".transition").classList.add("start");
  setTimeout(function () {
    document.querySelector("body").querySelector(".fullscreen").classList.add("hidden");
    setTimeout(function () {
      document.querySelector(".transition").classList.remove("start");
      document.querySelector(".transition").classList.add("stop");
      setTimeout(function () {
        document.querySelector(".transition").classList.remove("stop");
      }, 300);
    }, 100);
  }, 300);
}

function createPreview() {
  var html_code = document.querySelector('[name="html_code_visible"]').value.replaceAll("'", '"');
  var css_code = document.querySelector('[name="css_code_visible"]').value;
  var javascript_code = document.querySelector('[name="javascript_code_visible"]').value.replaceAll("'", '"');

  document.querySelector('#preview_iframe').srcdoc = 
              '<html>'
                + '<head>'
                  + '<!-- ===== Boxicons CSS ===== -->'
                  + '<link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">'

                  + '<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">'

                  + '<style>'
                    + 'body {'
                      + 'width: 100%;'
                      + 'min-height: 500px;'
                      + 'margin: 0;'
                      + 'height: 100%;'
                    + '}'
                    + '* {'
                      + 'font-family: "Inter", sans-serif;'
                      + '-webkit-tap-highlight-color: rgba(255, 255, 255, 0);'
                      + '-webkit-tap-highlight-color: transparent;'
                    + '}'
                    + css_code
                  + '</style>'
                + '</head>'
                + '<body>'
                  + html_code.replaceAll('href="#"', "").replaceAll("href='#'", "")
                  + '<script>'
                    + javascript_code
                  + '</script>'
                + '</body>'
              + '</html>';

}

