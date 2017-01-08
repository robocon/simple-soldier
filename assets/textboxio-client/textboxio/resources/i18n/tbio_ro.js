/** @license
 * Copyright (c) 2013-2016 Ephox Corp. All rights reserved.
 * This software is provided "AS IS," without a warranty of any kind.
 */
!function(){var a=function(){return{a11y:{widget:{title:"Verificator accesibilitate",running:"\xcen curs de verificare...",issue:{counter:"Problema {0} din {1}",help:"WCAG 2.0 referin\u0163\u0103 - se deschide \xeentr-o fereastr\u0103 nou\u0103",none:"Nu au fost detectate probleme de accesibilitate"},previous:"Problema anterioar\u0103",next:"Problema urm\u0103toare",repair:"Problem\u0103 reparare",available:"Reparare disponibil\u0103",ignore:"Ignorare"},image:{alttext:{empty:"Imaginile trebuie s\u0103 aib\u0103 o descriere text alternativ",filenameduplicate:"Textul alternativ nu trebuie s\u0103 fie acela\u015fi cu denumirea de fi\u015fier a imaginii",set:"Furnizare text alternativ:",validation:{empty:"Textul alternativ nu poate fi gol",filenameduplicate:"Textul alternativ nu poate fi acela\u015fi cu denumirea de fi\u015fier"}}},table:{caption:{empty:"Tabelele trebuie s\u0103 aib\u0103 legende",summaryduplicate:"Legenda \u015fi rezumatul tabelului nu pot avea aceea\u015fi valoare",set:"Furnizare legend\u0103:",validation:{empty:"Legenda nu poate fi goal\u0103",summaryduplicate:"Legenda tabelului nu poate fi aceea\u015fi cu rezumatul tabelului"}},summary:{empty:"Tabelele complexe trebuie s\u0103 aib\u0103 rezumate",set:"Furnizare rezumat tabel:",validation:{empty:"Rezumatul nu poate fi gol",captionduplicate:"Rezumatul tabelului nu poate fi acela\u015fi cu legenda tabelului"}},rowscells:{none:"Elementele tabelului trebuie s\u0103 con\u0163in\u0103 etichete TR \u015fi TD"},headers:{none:"Tabelele trebuie s\u0103 aib\u0103 cel pu\u0163in o celul\u0103 antet",set:"Alegere antet tabel:",validation:{none:"Selecta\u0163i fie un antet r\xe2nd, fie un antet coloan\u0103"}},headerscope:{none:"Antetele de tabel trebuie aplicate unui r\xe2nd sau unei coloane",set:"Selectare domeniu antet:",scope:{row:"R\xe2nd",col:"Coloan\u0103",rowgroup:"Grup r\xe2nduri",colgroup:"Grup coloane"}}},heading:{nonsequential:"Antetele trebuie aplicate \xeen ordine secven\u0163ial\u0103. De exemplu: Antetul 1 trebuie urmat de Antetul 2, nu de Antetul 3.",paragraphmisuse:"Acest paragraf arat\u0103 ca un antet. Dac\u0103 este un antet, selecta\u0163i un nivel de antet.",set:"Selecta\u0163i un nivel de antet:"},link:{adjacent:"Linkurile adiacente cu aceea\u015fi adres\u0103 URL trebuie fuzionate \xeentr-un singur link"},list:{paragraphmisuse:"Textul selectat pare s\u0103 fie o list\u0103. Listele trebuie formatate folosind o etichet\u0103 list\u0103."},contrast:{smalltext:"Textul trebuie s\u0103 aib\u0103 o rat\u0103 de contrast de cel pu\u0163in 4,5:1",largetext:"Textul mare trebuie s\u0103 aib\u0103 o rat\u0103 de contrast de cel pu\u0163in 3:1"},severity:{error:"Eroare",warning:"Avertisment",info:"Informativ"}},aria:{autocorrect:{announce:"Corectare automat\u0103 {0}"},label:{toolbar:"Bar\u0103 de instrumente Editor de text \xeembog\u0103\u0163it",editor:"Editor de text \xeembog\u0103\u0163it Textbox.io - {0}",more:"Clic pentru extindere sau restr\xe2ngere"},help:{mac:"Ap\u0103sa\u0163i \u2303\u2325H pentru ajutor",ctrl:"Ap\u0103sa\u0163i CTRL SHIFT H pentru ajutor"},color:{picker:"Selector culori"},font:{color:"Culori text",highlight:"Eviden\u0163iere culori",palette:"Palet\u0103 de culori"},context:{menu:{generic:"Meniu contextual"}},table:{headerdescription:"Ap\u0103sa\u0163i tasta Space pentru a activa configurarea. Ap\u0103sa\u0163i tasta Tab pentru a reveni la selectorul pentru tabel.",cell:{border:{size:"Dimensiune bordur\u0103"}}},input:{invalid:"Intrare incorect\u0103"},widget:{navigation:"Utiliza\u0163i tastele s\u0103ge\u0163i pentru a naviga."},image:{crop:{size:"Dimensiunea de decupare este {0} pixeli cu {1} pixeli"}}},color:{white:"Alb",black:"Negru",gray:"Gri",metal:"Metal",smoke:"Fumuriu",red:"Ro\u015fu",darkred:"Ro\u015fu \xeenchis",darkorange:"Portocaliu \xeenchis",orange:"Portocaliu",yellow:"Galben",green:"Verde",darkgreen:"Verde \xeenchis",mediumseagreen:"Verde marin mediu",lightgreen:"Verde deschis",lime:"Galben l\u0103m\xe2i",mediumblue:"Albastru mediu",navy:"Bleumarin",blue:"Albastru",lightblue:"Albastru deschis",violet:"Violet"},directionality:{rtldir:"Direc\u0163ie de la dreapta la st\xe2nga",ltrdir:"Direc\u0163ie de la st\xe2nga la dreapta"},parlance:{set:"Setare limb\u0103",ar:"Arab\u0103",ca:"Catalan\u0103",zh_cn:"Chinez\u0103 (Simplificat\u0103)",zh_tw:"Chinez\u0103 (Tradi\u0163ional\u0103)",hr:"Croat\u0103",cs:"Ceh\u0103",da:"Danez\u0103",nl:"Olandez\u0103",en:"Englez\u0103",en_au:"Englez\u0103 (Australia)",en_ca:"Englez\u0103 (Canada)",en_gb:"Englez\u0103 (Marea Britanie)",en_us:"Englez\u0103 (Statele Unite ale Americii)",fa:"Farsi",fi:"Finlandez\u0103",fr:"Francez\u0103",fr_ca:"Francez\u0103 (Canada)",de:"German\u0103",el:"Greac\u0103",he:"Ebraic\u0103",hu:"Maghiar\u0103",it:"Italian\u0103",ja:"Japonez\u0103",kk:"Kazah\u0103",ko:"Coreean\u0103",no:"Norvegian\u0103",pl:"Polonez\u0103",pt_br:"Portughez\u0103 (Brazilia)",pt_pt:"Portughez\u0103 (Portugalia)",ro:"Rom\xe2n\u0103",ru:"Rus\u0103",sk:"Slovac\u0103",sl:"Sloven\u0103",es:"Spaniol\u0103",es_419:"Spaniol\u0103 (America Latin\u0103)",es_es:"Spaniol\u0103 (Spania)",sv:"Suedez\u0103",tt:"T\u0103tar\u0103",th:"Thai",tr:"Turc\u0103",uk:"Ucrainean\u0103"},taptoedit:"Atinge\u0163i pentru a edita",plaincode:{dialog:{title:"Vizualizare Cod",editor:"Editor surs\u0103 HTML"}},help:{dialog:{accessibility:"Navigare de la tastatur\u0103",a11ycheck:"Verificare accesibilitate",about:"Despre Textbox.io",markdown:"Formatare Markdown",shortcuts:"Comenzi rapide de la tastatur\u0103"}},spelling:{context:{more:"Mai mult",morelabel:"Submeniu Mai multe op\u0163iuni de ortografiere"}},specialchar:{open:"Caracter special",dialog:"Inserare caracter special",latin:"Latin\u0103",insert:"Introducere",punctuation:"Punctua\u0163ie",currency:"Monede","extended-latin-a":"Latin\u0103 extins\u0103 A","extended-latin-b":"Latin\u0103 extins\u0103 B",arrows:"S\u0103ge\u0163i",mathematical:"Matematic\u0103",miscellaneous:"Diverse",selects:"Caractere selectate"},insert:{menu:"Introducere",link:"Link",image:"Imagine",table:"Tabel",horizontalrule:"Rigl\u0103 orizontal\u0103",media:"Media"},media:{embed:"Cod \xeencorporat media",insert:"Introducere",placeholder:"Lipi\u0163i codul \xeencorporat aici."},wordcount:{open:"Num\u0103r\u0103toare de cuvinte",dialog:"Num\u0103r\u0103toare de cuvinte",counts:"Num\u0103r\u0103toare",selection:"Selec\u0163ie",document:"Document",characters:"Caractere",charactersnospaces:"Caractere (f\u0103r\u0103 spa\u0163ii)",words:"Cuvinte"},list:{unordered:{default:"Neordonat implicit",circle:"Neordonat circular",square:"Neordonat p\u0103trat",disc:"Neordonat disc"},ordered:{default:"Ordonat implicit",decimal:"Ordonat zecimale","upper-alpha":"Ordonat majuscule","lower-alpha":"Ordonat minuscule","upper-roman":"Ordonat cifre romane majuscule","lower-roman":"Ordonat cifre romane minuscule","lower-greek":"Ordonat alfabet grec minuscule"}},tag:{inline:{class:"span ({0})"},img:"imagine"},block:{normal:"Normal",p:"Paragraf",h1:"Stil titlu 1",h2:"Stil titlu 2",h3:"Stil titlu 3",h4:"Stil titlu 4",h5:"Stil titlu 5",h6:"Stil titlu 6",div:"Div",pre:"Pre",li:"Element de list\u0103",td:"Celul\u0103",th:"Celul\u0103 de antet",styles:"Stiluri",dropdown:"Blocuri",describe:"Stil curent {0}",label:{inline:"Stiluri interioare",table:"Stiluri tabel",line:"Stiluri linie",media:"Stiluri media",list:"Stiluri list\u0103",link:"Stiluri link"}},font:{menu:"Meniu fonturi",face:"Tip caractere",size:"Dimensiuni",coloroption:"Culoare",describe:"Font curent {0}",color:"Text",highlight:"Eviden\u0163iere",stepper:{input:"Setare dimensiune fonturi",increase:"Cre\u015ftere dimensiune fonturi",decrease:"Reducere dimensiune fonturi"}},cog:{menu:"Set\u0103ri",spellcheck:"Verificare ortografic\u0103",capitalisation:"Scriere cu majuscule",autocorrect:"Corectare automat\u0103",linkpreviews:"Previzualiz\u0103ri link-uri",help:"Ajutor"},alignment:{menu:"Aliniere",left:"Aliniere la st\xe2nga",center:"Aliniere la centru",right:"Aliniere la dreapta",justify:"Aliniere st\xe2nga-dreapta",describe:"Aliniere curent\u0103 {0}"},category:{language:"Grup limb\u0103",undo:"Anulare \u015fi refacere grup",insert:"Introducere grup",style:"Grup stiluri",emphasis:"Grup formatare",align:"Grup aliniere",listindent:"List\u0103 \u015fi grup de indentare",format:"Grup fonturi",tools:"Grup instrumente",table:"Grup tabele",image:"Grup Editare imagine"},action:{undo:"Anulare",redo:"Refacere",bold:"Aldin",italic:"Cursiv",underline:"Subliniere",strikethrough:"T\u0103iere",subscript:"Indice",superscript:"Exponent",removeformat:"Eliminare formatare",bullist:"List\u0103 neordonat\u0103",numlist:"List\u0103 ordonat\u0103",indent:"Indentare mai mult",outdent:"Indentare mai pu\u0163in",blockquote:"Blockquote",fullscreen:"Ecran complet",search:"G\u0103sire / \xcenlocuire",a11ycheck:"Verificare accesibilitate",toggle:{fullscreen:"Ie\u015fire ecran complet"}},table:{"column-header":"Coloan\u0103 antet","row-header":"R\xe2nd antet",float:"Aliniere mobil\u0103",cell:{color:{border:"Culoare bordur\u0103",background:"Culoare fundal"},border:{width:"L\u0103\u0163ime bordur\u0103",stepper:{input:"Setare l\u0103\u0163ime bordur\u0103",increase:"M\u0103rire l\u0103\u0163ime bordur\u0103",decrease:"Mic\u015forare l\u0103\u0163ime bordur\u0103"}}},context:{row:{title:"Submeniu r\xe2nd",menu:"R\xe2nd",insertabove:"Introducere sus",insertbelow:"Introducere jos"},column:{title:"Submeniu coloan\u0103",menu:"Coloan\u0103",insertleft:"Introducere la st\xe2nga",insertright:"Introducere la dreapta"},cell:{merge:"\xcembinare celule",unmerge:"Anulare \xeembinare celule"},table:{title:"Submeniu tabel",menu:"Tabel",properties:"Propriet\u0103\u0163i",delete:"\u015etergere"},common:{delete:"\u015etergere",normal:"Setare ca Normal",header:"Setare ca Antet"},palette:{show:"Op\u0163iunile de editare tabel disponibile \xeen bara de instrumente",hide:"Op\u0163iunile de editare tabel nu mai sunt disponibile"}},picker:{header:"Set antete",label:"Selector tabel",describepicker:"Utiliza\u0163i tastele s\u0103ge\u0163i pentru a seta dimensiunea tabelului.  Ap\u0103sa\u0163i tasta Tab pentru a merge la set\u0103rile antetului de tabel. Ap\u0103sa\u0163i tasta Space sau tasta Enter pentru a introduce tabelul.",rows:"{0} \xeen\u0103l\u0163ime",cols:"{0} l\u0103\u0163ime"},border:"Bordur\u0103",summary:"Rezumat",dialog:"Propriet\u0103\u0163i tabel",caption:"Legend\u0103 tabel",width:"L\u0103\u0163ime",height:"\xcen\u0103l\u0163ime"},align:{none:"Nu se aliniaz\u0103",center:"Aliniere la centru",left:"Aliniere la st\xe2nga",right:"Aliniere la dreapta"},button:{ok:"OK",cancel:"Revocare"},border:{on:"Activare",off:"Dezactivare",labels:{on:"Margine activat\u0103",off:"Margine dezactivat\u0103"}},loading:{wait:"V\u0103 rug\u0103m a\u015ftepta\u0163i..."},toolbar:{more:"Mai mult",backbutton:"\xcenapoi","switch-code":"Comutare la vizualizare cod","switch-pencil":"Comutare la vizualizare Design"},link:{context:{edit:"Editare link"},dialog:{aria:{update:"Actualizare link",insert:"Inserare link",properties:"Propriet\u0103\u0163i link",quick:"Op\u0163iuni rapide"},edit:"Editare",remove:"Eliminare",preview:"Previzualizare",update:"Actualizare",insert:"Introducere",tooltip:"Link"},properties:{dialog:{title:"Propriet\u0103\u0163i link"},text:{label:"Text de afi\u015fat"},url:{label:"URL"},title:{label:"Titlu"},button:{remove:"Eliminare"},target:{label:"Destina\u0163ie",none:"Nu se utilizeaz\u0103 (acest c\xe2mp)",blank:"Fereastr\u0103 nou\u0103",top:"Pagin\u0103 \xeentreag\u0103",self:"Acela\u015fi cadru",parent:"Cadru p\u0103rinte"}}},fileupload:{title:"Introducere imagini",tablocal:"Fi\u015fiere locale",tabweburl:"Adres\u0103 URL web",dropimages:"Fixare imagini aici",chooseimage:"Alegere imagine pentru \xeenc\u0103rcat",web:{url:"URL imagine web:"},weburlhelp:"Introduce\u021bi adresa URL pentru a observa o previzualizare a imaginii. Poate fi necesar un interval de timp mai lung pentru afi\u015farea imaginilor mari.",invalid1:"Nu am putut g\u0103si o imagine la adresa URL pe care o utiliza\u0163i.",invalid2:"Verifica\u0163i adresa URL pentru erori de tastare.",invalid3:"Asigura\u0163i-v\u0103 c\u0103 imaginea pe care o accesa\u0163i este public\u0103, nu este protejat\u0103 prin parol\u0103 \u015fi nu se afl\u0103 \xeentr-o re\u0163ea privat\u0103."},image:{context:{properties:"Propriet\u0103\u0163i imagine",palette:{show:"Op\u0163iunile de editare imagine disponibile \xeen bara de instrumente",hide:"Op\u0163iunile de editare imagine nu mai sunt disponibile"}},dialog:{title:"Propriet\u0103\u0163i imagine",fields:{align:"Aliniere mobil\u0103",url:"URL",urllocal:"Imaginea nu a fost salvat\u0103 \xeenc\u0103",alt:"Text alternativ",width:"L\u0103\u0163ime",height:"\xcen\u0103l\u0163ime",constrain:{label:"Restric\u0163ionare propor\u0163ii",on:"Propor\u021bii blocate",off:"Propor\u021bii deblocate"}}},menu:"Inserare imagine","from-url":"Adres\u0103 URL web","from-camera":"Camera Roll",toolbar:{rotateleft:"Rotire la st\xe2nga",rotateright:"Rotire la dreapta",fliphorizontal:"R\u0103sturnare orizontal\u0103",flipvertical:"R\u0103sturnare vertical\u0103",properties:"Propriet\u0103\u0163i imagine"},crop:{announce:"Accesare interfa\u0163\u0103 decupare. Ap\u0103sa\u0163i enter pentru aplicare, escape pentru anulare.",cancel:"Anularea opera\u0163iunii de decupare",begin:"Decupare imagine.",apply:"Aplicare decupare",handle:{nw:"Ghidare decupare st\xe2nga sus",ne:"Ghidare decupare dreapta sus",se:"Ghidare decupare dreapta jos",sw:"Ghidare decupare st\xe2nga jos",shade:"Masc\u0103 decupare"}}},units:{"amount-of-total":"{0} of {1}"},search:{search:"C\u0103utare",previous:"Anterior",next:"Urm\u0103torul",replace:"\xcenlocuire","replace-all":"\xcenlocuire peste tot",matchcase:"Potrivire majuscule \u015fi minuscule"},mentions:{initiated:"Men\u0163iune creat\u0103, continua\u0163i s\u0103 tasta\u0163i pentru varianta prestabilit\u0103",lookahead:{open:"Caset\u0103 cu variante prestabilite",cancelled:"Men\u0163iune anulat\u0103",searching:"C\u0103utare rezultate",selected:"Men\u0163iune introdus\u0103 a {0}",noresults:"Niciun rezultat"}},cement:{dialog:{paste:{title:"Op\u0163iuni de formatare con\u0163inut lipit",instructions:"Alege\u0163i p\u0103strarea sau eliminarea format\u0103rii pentru con\u0163inut lipit.",merge:"P\u0103strare formatare",clean:"Eliminare formatare"},flash:{title:"Import imagine local\u0103","trigger-paste":"Declan\u015fa\u0163i lipirea din nou de la tastatur\u0103 pentru a lipi con\u0163inutul cu imaginile.",missing:'Adobe Flash este necesar pentru importul imaginilor din Microsoft Office. Instala\u0163i <a href="http://get.adobe.com/flashplayer/" target="_blank">Adobe Flash Player</a>.',"press-escape":'Ap\u0103sa\u0163i <span class="ephox-polish-help-kbd">ESC</span> pentru a ignora imaginile locale \u015fi a continua editarea.'}}},cloud:{error:{apikey:"Codul dumneavoastr\u0103 API este incorect.",domain:"Domeniul dumneavoastr\u0103 ({0}) nu este compatibil cu codul dumneavoastr\u0103 API.",plan:"A\u0163i dep\u0103\u015fit num\u0103rul de desc\u0103rc\u0103ri editor pe care le ave\u0163i la dispozi\u0163ie conform planului dumneavoastr\u0103. Vizita\u0163i site-ul pentru actualizare."},dashboard:"Merge\u0163i la Tabloul de bord al administratorului"},errors:{paste:{notready:"Func\u0163ionalitatea de importare document \xeen format Word nu a fost \xeenc\u0103rcat\u0103. V\u0103 rug\u0103m a\u015ftepta\u0163i \u015fi \xeencerca\u0163i din nou.",generic:"A ap\u0103rut o eroare \xeen timpul lipirii con\u0163inutului."},toolbar:{missing:{custom:{string:'Comenzile de personalizare trebuie s\u0103 aib\u0103 proprietatea "{0}" \u015fi trebuie s\u0103 fie un \u015fir'}},invalid:"Configura\u0163ia pentru bara de instrumente nu este valid\u0103 ({0}). Consulta\u0163i consola pentru detalii."},spelling:{missing:{service:"Serviciul de corectare ortografic\u0103 nu a fost g\u0103sit: ({0})."}},images:{edit:{needsproxy:"Este necesar un proxy pentru a edita imaginile din acest domeniu: ({0})",proxyerror:"Nu este posibil\u0103 comunicarea cu acest proxy pentru a edita aceast\u0103 imagine. Consulta\u0163i consola pentru detalii.",generic:"S-a constatat o eroare \xeen timpul opera\u0163iunii de editare a imaginii. Consulta\u0163i consola pentru detalii."},disallowed:{local:"Lipirea imaginii locale a fost dezactivat\u0103. Imaginile locale au fost eliminate din con\u0163inutul lipit.",dragdrop:"Func\u0163ia de glisare \u015fi fixare a fost dezactivat\u0103."},upload:{unknown:"\xcenc\u0103rcarea imaginii a e\u015fuat",invalid:"Nu au fost procesate toate fi\u015fierele - unele nu sunt imagini valide",failed:"\xcenc\u0103rcarea imaginii a e\u015fuat: ({0}).",cors:"Nu poate fi contactat serviciul de \xeenc\u0103rcare imagini. Posibil\u0103 eroare CORS: ({0})"},missing:{service:"Serviciul de imagini nu a fost g\u0103sit: ({0}).",flash:"Set\u0103rile de securitate ale browser-ului dumneavoastr\u0103 pot \xeempiedica importarea imaginilor."},import:{failed:"C\xe2teva imagini nu s-au importat.",unsupported:"Tip imagine incompatibil.",invalid:"Imaginea nu este valid\u0103."}},safari:{image:"Safari nu accept\u0103 lipirea direct\u0103 a imaginilor.",url:"Mai multe informa\u0163ii privind lipirea imaginilor pentru Safari",rtf:"Mai multe informa\u0163ii privind lipirea pentru Safari"},flash:{crashed:"Imaginile n-au fost importate pentru c\u0103 Adobe Flash pare s\u0103 fi e\u0219uat. Aceast\u0103 eroare poate fi cauzat\u0103 de c\u0103tre lipirea unor documente mari."},http:{400:"Cerere incorect\u0103: {0}",401:"Neautorizat: {0}",403:"Interzis: {0}",404:"Nu s-a g\u0103sit: {0}",407:"Este necesar\u0103 autentificarea proxy: {0}",409:"Conflict fi\u015fier: {0}",413:"Sarcin\u0103 prea mare: {0}",415:"Tip media incompatibil: {0}",500:"Eroare intern\u0103 server: {0}",501:"Neimplementat: {0}"}}}},b=function(a,b){return a.src.indexOf(b)===a.src.length-b.length},c=function(a){for(var b=a.split("."),c=window,d=0;d<b.length&&void 0!==c&&null!==c;++d)c=c[b[d]];return c},d=function(a,d){for(var e,f=document.getElementsByTagName("script"),g=0;g<f.length;g++)if(e=b(f[g],a)){var h=f[g].getAttribute("data-main");if(void 0===h)throw"no data-main attribute found on "+d+" script tag";f[g].removeAttribute("data-main");var i=c(h);if("function"!=typeof i)throw"attribute on "+d+" does not reference a global method";return i}throw"cannot locate "+d+" script tag"},e=d("tbio_ro.js","strings for language ro");e({strings:a})}();