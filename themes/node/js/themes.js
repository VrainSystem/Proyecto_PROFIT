 // SKIN VERDE
            function cambia_verde() {
                cambia_divTopVerde();
                cambia_divLeftVerde();
                cambia_divLeftVerdeUser();
            }
            // SKIN VERDE TOP
            function cambia_divTopVerde() {
                var css = '.skin-blue .main-header .navbar{background-color:#338533}';

                style = document.createElement('style');
                if (style.styleSheet)
                    style.styleSheet.cssText = css;
                else
                    style.appendChild(document.createTextNode(css));
                document.getElementsByTagName('head')[0].appendChild(style);
            }

            // SKIN VERDE LEFT
            function cambia_divLeftVerde() {
                var css = '.skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side{background-color:#002900}';
                style = document.createElement('style');
                if (style.styleSheet)
                    style.styleSheet.cssText = css;
                else
                    style.appendChild(document.createTextNode(css));
                document.getElementsByTagName('head')[0].appendChild(style);
            }

            // SKIN VERDE USER
            function cambia_divLeftVerdeUser() {
                var css = '.skin-blue .main-header li.user-header{background-color:#80B280}';
                style = document.createElement('style');
                if (style.styleSheet)
                    style.styleSheet.cssText = css;
                else
                    style.appendChild(document.createTextNode(css));
                document.getElementsByTagName('head')[0].appendChild(style);
            }




            // SKIN AZUL
            function cambia_azul() {
                cambia_divTopazul();
                cambia_divLeftazul();
                cambia_divLeftazulUser();
            }

            // SKIN AZUL TOP
            function cambia_divTopazul() {
                var css = '.skin-blue .main-header .navbar{background-color:#194775}';

                style = document.createElement('style');
                if (style.styleSheet)
                    style.styleSheet.cssText = css;
                else
                    style.appendChild(document.createTextNode(css));
                document.getElementsByTagName('head')[0].appendChild(style);
            }

            // SKIN AZUL LEFT
            function cambia_divLeftazul() {
                var css = '.skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side{background-color:#001429}';
                style = document.createElement('style');
                if (style.styleSheet)
                    style.styleSheet.cssText = css;
                else
                    style.appendChild(document.createTextNode(css));
                document.getElementsByTagName('head')[0].appendChild(style);
            }

            // SKIN AZUL USER
            function cambia_divLeftazulUser() {
                var css = '.skin-blue .main-header li.user-header{background-color:#6685A3}';
                style = document.createElement('style');
                if (style.styleSheet)
                    style.styleSheet.cssText = css;
                else
                    style.appendChild(document.createTextNode(css));
                document.getElementsByTagName('head')[0].appendChild(style);
            }


            // SKIN GRIS 
            function cambia_gris() {
                cambia_divTopgris();
                cambia_divLeftgris();
                cambia_divLeftgrisUser();
            }

            // SKIN GRIS TOP
            function cambia_divTopgris() {
                var css = '.skin-blue .main-header .navbar{background-color:#4D4D4D}';

                style = document.createElement('style');
                if (style.styleSheet)
                    style.styleSheet.cssText = css;
                else
                    style.appendChild(document.createTextNode(css));
                document.getElementsByTagName('head')[0].appendChild(style);
            }

            // SKIN GRIS LEFT 
            function cambia_divLeftgris() {
                var css = '.skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side{background-color:#000000}';
                style = document.createElement('style');
                if (style.styleSheet)
                    style.styleSheet.cssText = css;
                else
                    style.appendChild(document.createTextNode(css));
                document.getElementsByTagName('head')[0].appendChild(style);
            }

            // SKIN GRIS  USER
            function cambia_divLeftgrisUser() {
                var css = '.skin-blue .main-header li.user-header{background-color:#999999}';
                style = document.createElement('style');
                if (style.styleSheet)
                    style.styleSheet.cssText = css;
                else
                    style.appendChild(document.createTextNode(css));
                document.getElementsByTagName('head')[0].appendChild(style);
            }

            // SKIN AMARILLO 
            function cambia_amarillo() {
                cambia_divTopamarillo();
                cambia_divLeftamarillo();
                cambia_divLeftamarilloUser();
            }

            // SKIN AMARILLO TOP
            function cambia_divTopamarillo() {
                var css = '.skin-blue .main-header .navbar{background-color:#FFD633}';

                style = document.createElement('style');
                if (style.styleSheet)
                    style.styleSheet.cssText = css;
                else
                    style.appendChild(document.createTextNode(css));
                document.getElementsByTagName('head')[0].appendChild(style);
            }

            // SKIN AMARILLO LEFT
            function cambia_divLeftamarillo() {
                var css = '.skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side{background-color:#4C3D00}';
                style = document.createElement('style');
                if (style.styleSheet)
                    style.styleSheet.cssText = css;
                else
                    style.appendChild(document.createTextNode(css));
                document.getElementsByTagName('head')[0].appendChild(style);
            }

            // SKIN AMARILLO USER
            function cambia_divLeftamarilloUser() {
                var css = '.skin-blue .main-header li.user-header{background-color:#FFEB99}';
                style = document.createElement('style');
                if (style.styleSheet)
                    style.styleSheet.cssText = css;
                else
                    style.appendChild(document.createTextNode(css));
                document.getElementsByTagName('head')[0].appendChild(style);
            }


            // SKIN ROJO 
            function cambia_rojo() {
                cambia_divToprojo();
                cambia_divLeftrojo();
                cambia_divLeftrojoUser();

            }

            // SKIN ROJO TOP
            function cambia_divToprojo() {
                var css = '.skin-blue .main-header .navbar{background-color:#A31919}';

                style = document.createElement('style');
                if (style.styleSheet)
                    style.styleSheet.cssText = css;
                else
                    style.appendChild(document.createTextNode(css));
                document.getElementsByTagName('head')[0].appendChild(style);
            }

            // SKIN ROJO LEFT
            function cambia_divLeftrojo() {
                var css = '.skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side{background-color:#2E0000}';
                style = document.createElement('style');
                if (style.styleSheet)
                    style.styleSheet.cssText = css;
                else
                    style.appendChild(document.createTextNode(css));
                document.getElementsByTagName('head')[0].appendChild(style);
            }

            // SKIN ROJO USER
            function cambia_divLeftrojoUser() {
                var css = '.skin-blue .main-header li.user-header{background-color:#CC8080}';
                style = document.createElement('style');
                if (style.styleSheet)
                    style.styleSheet.cssText = css;
                else
                    style.appendChild(document.createTextNode(css));
                document.getElementsByTagName('head')[0].appendChild(style);
            }
