/** @license
 * Copyright (c) 2013-2016 Ephox Corp. All rights reserved.
 * This software is provided "AS IS," without a warranty of any kind.
 */
!function(){var a=function(){return{a11y:{widget:{title:"V\xe9rificateur d'accessibilit\xe9",running:"V\xe9rification en cours...",issue:{counter:"Probl\xe8me {0} sur {1}",help:"R\xe9f\xe9rence WCAG 2.0 - s'ouvre dans une nouvelle fen\xeatre",none:"Aucun probl\xe8me d'accessibilit\xe9 d\xe9tect\xe9"},previous:"Probl\xe8me pr\xe9c\xe9dent",next:"Probl\xe8me suivant",repair:"R\xe9parer le probl\xe8me",available:"R\xe9paration disponible",ignore:"Ignorer"},image:{alttext:{empty:"Les images doivent avoir une description de texte de remplacement.",filenameduplicate:"Ce texte ne doit pas \xeatre identique au nom de fichier de l'image.",set:"Fournir un texte de remplacement\xa0:",validation:{empty:"Le champ Texte de remplacement doit \xeatre renseign\xe9.",filenameduplicate:"Le texte de remplacement ne peut pas \xeatre identique au nom de fichier."}}},table:{caption:{empty:"Les tableaux doivent avoir des l\xe9gendes.",summaryduplicate:"La l\xe9gende du tableau et sa synth\xe8se ne peuvent pas \xeatre identiques.",set:"Fournir une l\xe9gende\xa0:",validation:{empty:"Le champ L\xe9gende doit \xeatre renseign\xe9.",summaryduplicate:"La l\xe9gende du tableau ne doit pas \xeatre identique \xe0 la synth\xe8se du tableau."}},summary:{empty:"Les tableaux complexes doivent avoir des synth\xe8ses.",set:"Fournir une synth\xe8se de tableau\xa0:",validation:{empty:"Le champ Synth\xe8se doit \xeatre renseign\xe9.",captionduplicate:"La synth\xe8se du tableau ne doit pas \xeatre identique \xe0 la l\xe9gende du tableau."}},rowscells:{none:"Les \xe9l\xe9ments du tableau doivent contenir les \xe9tiquettes TR et TD."},headers:{none:"Les tableaux doivent poss\xe9der une cellule d'en-t\xeate au minimum.",set:"Choisir un en-t\xeate de tableau\xa0:",validation:{none:"Veuillez s\xe9lectionner un en-t\xeate de ligne ou de colonne."}},headerscope:{none:"Des en-t\xeates de tableau doivent \xeatre appliqu\xe9s aux lignes ou aux colonnes.",set:"S\xe9lectionner la port\xe9e de l'en-t\xeate\xa0:",scope:{row:"Ligne",col:"Colonne",rowgroup:"Groupe de lignes",colgroup:"Groupe de colonnes"}}},heading:{nonsequential:"Les titres doivent \xeatre appliqu\xe9s en ordre s\xe9quentiel. Par exemple, le titre\xa01 doit \xeatre suivi par le titre\xa02 et non pas le titre\xa03.",paragraphmisuse:"Ce paragraphe ressemble \xe0 un titre. S'il s'agit d'un titre, veuillez choisir un niveau de titre.",set:"S\xe9lectionner un niveau de titre\xa0:"},link:{adjacent:"Les liens adjacents avec le m\xeame URL doivent \xeatre fusionn\xe9s dans le m\xeame lien."},list:{paragraphmisuse:"Le texte s\xe9lectionn\xe9 semble \xeatre une liste. Les listes doivent \xeatre formatt\xe9es en utilisant une \xe9tiquette de liste."},contrast:{smalltext:"Le texte doit poss\xe9der un rapport de contraste de 4,5:1 au minimum",largetext:"Le texte grande taille doit poss\xe9der un rapport de contraste de 3:1 au minimum"},severity:{error:"Erreur",warning:"Attention",info:"Informatif"}},aria:{autocorrect:{announce:"Correction automatique {0}"},label:{toolbar:"Barre d'outils d'\xe9diteur de texte enrichi",editor:"\xc9diteur de texte enrichi Textbox.io - {0}",more:"Cliquer pour d\xe9velopper ou r\xe9duire"},help:{mac:"Appuyez sur \u2303\u2325H pour une aide",ctrl:"Appuyez sur CTRL SHIFT H pour une aide"},color:{picker:"S\xe9lecteur de couleurs"},font:{color:"Couleurs de texte",highlight:"Couleurs de mise en surbrillance",palette:"Palette de couleurs"},context:{menu:{generic:"Menu contextuel"}},table:{headerdescription:"Appuyez sur la barre d'espace pour activer le param\xe8tre. Appuyez sur la touche tab pour retourner au s\xe9lecteur de table.",cell:{border:{size:"Taille de la bordure"}}},input:{invalid:"Entr\xe9e non valide"},widget:{navigation:"Utilisez les touches de direction pour naviguer."},image:{crop:{size:"La taille du rognage est de {0} pixels par {1} pixels"}}},color:{white:"Blanc",black:"Noir",gray:"Gris",metal:"M\xe9tal",smoke:"Fum\xe9e",red:"Rouge",darkred:"Rouge fonc\xe9",darkorange:"Orange fonc\xe9",orange:"Orange",yellow:"Jaune",green:"Vert",darkgreen:"Vert fonc\xe9",mediumseagreen:"Vert marin moyen",lightgreen:"Vert clair",lime:"Vert citron",mediumblue:"Bleu moyen",navy:"Bleu marine",blue:"Bleu",lightblue:"Bleu clair",violet:"Violet"},directionality:{rtldir:"Sens de droite \xe0 gauche",ltrdir:"Sens de gauche \xe0 droite"},parlance:{set:"D\xe9finir la langue",ar:"Arabe",ca:"Catalan",zh_cn:"Chinois (simplifi\xe9)",zh_tw:"Chinois (traditionnel)",hr:"Croate",cs:"Tch\xe8que",da:"Danois",nl:"N\xe9erlandais",en:"Anglais",en_au:"Anglais (Australie)",en_ca:"Anglais (Canada)",en_gb:"Anglais (Royaume-Uni)",en_us:"Anglais (\xc9tats-Unis)",fa:"Farsi",fi:"Finlandais",fr:"Fran\xe7ais",fr_ca:"Fran\xe7ais (Canada)",de:"Allemand",el:"Grec",he:"H\xe9breu",hu:"Hongrois",it:"Italien",ja:"Japonais",kk:"Kazakh",ko:"Cor\xe9en",no:"Norv\xe9gien",pl:"Polonais",pt_br:"Portugais (Br\xe9sil)",pt_pt:"Portugais (Portugal)",ro:"Roumain",ru:"Russe",sk:"Slovaque",sl:"Slov\xe8ne",es:"Espagnol",es_419:"Espagnol (Am\xe9rique Latine)",es_es:"Espagnol (Espagne)",sv:"Su\xe9dois",tt:"Tatar",th:"Tha\xef",tr:"Turc",uk:"Ukrainien"},taptoedit:"Tapez pour modifier",plaincode:{dialog:{title:"Mode code",editor:"\xc9diteur de code source HTML"}},help:{dialog:{accessibility:"Navigation au clavier",a11ycheck:"V\xe9rification de l'accessibilit\xe9",about:"\xc0 propos de Textbox.io",markdown:"Mise en forme Markdown",shortcuts:"Raccourcis clavier"}},spelling:{context:{more:"Plus",morelabel:"Sous-menu Autres options du v\xe9rificateur d'orthographe"}},specialchar:{open:"Caract\xe8re sp\xe9cial",dialog:"Ins\xe9rer un caract\xe8re sp\xe9cial",latin:"Latin",insert:"Ins\xe9rer",punctuation:"Ponctuation",currency:"Devises","extended-latin-a":"Latin \xe9tendu-A","extended-latin-b":"Latin \xe9tendu-B",arrows:"Fl\xe8ches",mathematical:"Op\xe9rateurs math\xe9matiques",miscellaneous:"Divers",selects:"Caract\xe8res s\xe9lectionn\xe9s"},insert:{menu:"Ins\xe9rer",link:"Lien",image:"Ic\xf4ne",table:"Tableau",horizontalrule:"R\xe8gle horizontale",media:"M\xe9dia"},media:{embed:"Incorporer le code de contenu multim\xe9dia",insert:"Ins\xe9rer",placeholder:"Collez le code incorpor\xe9 ici."},wordcount:{open:"Statistiques",dialog:"Statistiques",counts:"Total",selection:"S\xe9lection",document:"Document",characters:"Caract\xe8res",charactersnospaces:"Caract\xe8res (espaces non compris)",words:"Mots"},list:{unordered:{default:"Non tri\xe9e par d\xe9faut",circle:"Non tri\xe9e avec cercle",square:"Non tri\xe9e avec carr\xe9",disc:"Non tri\xe9e avec disque"},ordered:{default:"Tri\xe9e par d\xe9faut",decimal:"Tri\xe9e par num\xe9rotation","upper-alpha":"Tri\xe9e par lettre majuscule","lower-alpha":"Tri\xe9e par lettre minuscule","upper-roman":"Tri\xe9e par chiffre romain majuscule","lower-roman":"Tri\xe9e par chiffre romain minuscule","lower-greek":"Tri\xe9e par lettre grecque"}},tag:{inline:{class:"span ({0})"},img:"image"},block:{normal:"Normal",p:"Paragraphe",h1:"Titre\xa01",h2:"Titre\xa02",h3:"Titre\xa03",h4:"Titre\xa04",h5:"Titre\xa05",h6:"Titre\xa06",div:"Div",pre:"Pre",li:"\xc9l\xe9ment de liste",td:"Cellule",th:"Cellule d'en-t\xeate",styles:"Styles",dropdown:"Blocs",describe:"Style actuel {0}",label:{inline:"Styles intralignes",table:"Styles de tableaux",line:"Styles des lignes",media:"Styles de m\xe9dia",list:"Styles de liste",link:"Styles de lien"}},font:{menu:"Menu Police",face:"Police",size:"Taille",coloroption:"Couleur",describe:"Police actuelle {0}",color:"Texte",highlight:"Surlignage",stepper:{input:"Configurer la taille de police",increase:"Augmenter la taille de police",decrease:"R\xe9duire la taille de police"}},cog:{menu:"R\xe9glages",spellcheck:"V\xe9rification orthographique",capitalisation:"Mise en majuscules",autocorrect:"Correction automatique",linkpreviews:"Aper\xe7us de lien",help:"Aide"},alignment:{menu:"Alignement",left:"Aligner \xe0 gauche",center:"Aligner au centre",right:"Aligner \xe0 droite",justify:"Justifier",describe:"Alignement actuel {0}"},category:{language:"Groupe Langues",undo:"Groupe Annuler et R\xe9tablir",insert:"Groupe Ins\xe9rer",style:"Groupe Styles",emphasis:"Groupe Mise en forme",align:"Groupe Alignement",listindent:"Groupe Liste et Retrait",format:"Groupe Police",tools:"Groupe Outils",table:"Groupe Tableau",image:"Groupe Modification de l'image"},action:{undo:"Annuler",redo:"R\xe9tablir",bold:"Gras",italic:"Italique",underline:"Soulign\xe9",strikethrough:"Barr\xe9",subscript:"Indice",superscript:"Exposant",removeformat:"Supprimer la mise en forme",bullist:"Liste non tri\xe9e",numlist:"Liste tri\xe9e",indent:"Augmenter le retrait",outdent:"Diminuer le retrait",blockquote:"Blockquote",fullscreen:"Plein \xe9cran",search:"Rechercher / remplacer",a11ycheck:"V\xe9rifier l'accessibilit\xe9",toggle:{fullscreen:"Quitter le plein \xe9cran"}},table:{"column-header":"Colonne d'en-t\xeate","row-header":"Ligne d'en-t\xeate",float:"Alignement flottant",cell:{color:{border:"Couleur de bordure",background:"Couleur d'arri\xe8re-plan"},border:{width:"Largeur de la bordure",stepper:{input:"D\xe9finir la largeur de la bordure",increase:"Augmenter la largeur de la bordure",decrease:"R\xe9duire la largeur de la bordure"}}},context:{row:{title:"Sous-menu Ligne",menu:"Ligne",insertabove:"Ins\xe9rer au-dessus",insertbelow:"Ins\xe9rer en dessous"},column:{title:"Sous-menu Colonne",menu:"Colonne",insertleft:"Ins\xe9rer \xe0 gauche",insertright:"Ins\xe9rer \xe0 droite"},cell:{merge:"Fusionner les cellules",unmerge:"Dissocier les cellules"},table:{title:"Sous-menu Table",menu:"Tableau",properties:"Propri\xe9t\xe9s",delete:"Supprimer"},common:{delete:"Supprimer",normal:"D\xe9finir comme Normal",header:"D\xe9finir comme en-t\xeate"},palette:{show:"Options de modification de tableau disponibles dans la barre d'outils",hide:"Les options de modification de tableau ne sont plus disponibles"}},picker:{header:"D\xe9finition de l'en-t\xeate",label:"S\xe9lecteur de table",describepicker:"Utilisez les touches de direction pour d\xe9finir la taille de la table.  Appuyez sur la touche tab pour retourner aux param\xe8tres de l'en-t\xeate. Appuyez sur la touche espace ou entr\xe9e pour ins\xe9rer une table.",rows:"{0} de haut",cols:"{0} de large"},border:"Bordure",summary:"R\xe9sum\xe9",dialog:"Propri\xe9t\xe9s du tableau",caption:"L\xe9gende du tableau",width:"Largeur",height:"Hauteur"},align:{none:"Ne rien aligner",center:"Aligner au centre",left:"Aligner \xe0 gauche",right:"Aligner \xe0 droite"},button:{ok:"OK",cancel:"Annuler"},border:{on:"Activer",off:"D\xe9sactiver",labels:{on:"Bordure activ\xe9e",off:"Bordure d\xe9sactiv\xe9e"}},loading:{wait:"Merci de patienter"},toolbar:{more:"Plus",backbutton:"Retour","switch-code":"Passer en mode Code","switch-pencil":"Passer en mode Cr\xe9ation"},link:{context:{edit:"Modifier le lien"},dialog:{aria:{update:"Mettre \xe0 jour le lien",insert:"Ins\xe9rer un lien",properties:"Propri\xe9t\xe9s du lien",quick:"Options rapides"},edit:"Modifier",remove:"Supprimer",preview:"Aper\xe7u",update:"Mettre \xe0 jour",insert:"Ins\xe9rer",tooltip:"Lien"},properties:{dialog:{title:"Propri\xe9t\xe9s du lien"},text:{label:"Texte \xe0 afficher"},url:{label:"URL"},title:{label:"Titre"},button:{remove:"Supprimer"},target:{label:"Cible",none:"Aucun",blank:"Nouvelle fen\xeatre",top:"Page enti\xe8re",self:"Trame identique",parent:"Trame parent"}}},fileupload:{title:"Ins\xe9rer des images",tablocal:"Fichiers locaux",tabweburl:"URL",dropimages:"D\xe9poser les images ici",chooseimage:"Choisir une image \xe0 charger",web:{url:"URL de l'image Web\xa0:"},weburlhelp:"Saisissez votre URL pour obtenir un aper\xe7u d'image. Les images de grande taille peuvent mettre un moment \xe0 s'afficher.",invalid1:"Aucune image n'a \xe9t\xe9 trouv\xe9e \xe0 l'URL que vous utilisez.",invalid2:"V\xe9rifiez que votre URL ne comporte aucune erreur de frappe.",invalid3:"V\xe9rifiez que l'image \xe0 laquelle vous acc\xe9dez est publique et non prot\xe9g\xe9e par un mot de passe ou accessible uniquement sur un r\xe9seau priv\xe9."},image:{context:{properties:"Propri\xe9t\xe9s des images",palette:{show:"Options de modification d'image disponibles dans la barre d'outils",hide:"Les options de modification d'image ne sont plus disponibles"}},dialog:{title:"Propri\xe9t\xe9s des images",fields:{align:"Alignement flottant",url:"URL",urllocal:"L'image n'est pas encore enregistr\xe9e",alt:"Alternative de texte",width:"Largeur",height:"Hauteur",constrain:{label:"Limiter les proportions",on:"Proportions verrouill\xe9es",off:"Proportions d\xe9verrouill\xe9es"}}},menu:"Ins\xe9rer une image","from-url":"URL","from-camera":"Pellicule",toolbar:{rotateleft:"Faire pivoter sur la gauche",rotateright:"Faire pivoter sur la droite",fliphorizontal:"Retourner horizontalement",flipvertical:"Retourner verticalement",properties:"Propri\xe9t\xe9s des images"},crop:{announce:"Entrer dans l'interface de rognage. Appuyer sur Entr\xe9e pour appliquer ou sur \xc9chap. pour annuler.",cancel:"Annulation de l'op\xe9ration de rognage",begin:"Rogner l'image.",apply:"Appliquer le rognage",handle:{nw:"Poign\xe9e de rognage gauche sup\xe9rieur",ne:"Poign\xe9e de rognage droit sup\xe9rieur",se:"Poign\xe9e de rognage droit inf\xe9rieur",sw:"Poign\xe9e de rognage gauche inf\xe9rieur",shade:"Masque de rognage"}}},units:{"amount-of-total":"{0} sur {1}"},search:{search:"Rechercher",previous:"Pr\xe9c\xe9dente",next:"Suivante",replace:"Remplacer","replace-all":"Remplacer tout",matchcase:"Respecter la casse"},mentions:{initiated:"Mention cr\xe9\xe9e, continuer de taper pour saisie semi-automatique",lookahead:{open:"Liste d\xe9roulante avec saisie semi-automatique",cancelled:"Mention annul\xe9e",searching:"Recherche de r\xe9sultats",selected:"Mention {0} ins\xe9r\xe9e",noresults:"Aucun r\xe9sultat"}},cement:{dialog:{paste:{title:"Options de mise en forme du collage",instructions:"Choisir de conserver ou de supprimer la mise en forme du contenu coll\xe9.",merge:"Conserver la mise en forme",clean:"Supprimer la mise en forme"},flash:{title:"Importation d'une image locale","trigger-paste":"Pour coller un contenu avec des images, utilisez une nouvelle fois le raccourci clavier de collage.",missing:'Adobe Flash est n\xe9cessaire \xe0 l\'importation d\'images depuis Microsoft Office. Installez le <a href="http://get.adobe.com/flashplayer/" target="_blank">lecteur Adobe Flash</a>.',"press-escape":'Appuyez sur la touche <span class="ephox-polish-help-kbd">\xc9chap</span> pour ignorer les images locales et continuer la modification.'}}},cloud:{error:{apikey:"Votre cl\xe9 API n'est pas valide.",domain:"Votre domaine ({0}) n'est pas pris en charge par votre cl\xe9 API.",plan:"Vous avez d\xe9pass\xe9 le nombre de t\xe9l\xe9chargements de l'\xe9diteur autoris\xe9 par votre offre. Visitez notre site Web pour une mise \xe0 niveau."},dashboard:"Allez sur le Administrator Dashboard (Tableau de bord de l'administrateur)"},errors:{paste:{notready:"La fonctionnalit\xe9 d'import de Word n'est pas charg\xe9e. Veuillez patienter et r\xe9essayez.",generic:"Une erreur s'est produite en collant le contenu."},toolbar:{missing:{custom:{string:'Les commandes personnalis\xe9es doivent poss\xe9der la propri\xe9t\xe9 "{0}" et \xeatre de type cha\xeene de caract\xe8res'}},invalid:"La configuration de la barre d'outils n'est pas valide ({0}). Voir la console pour plus d'informations."},spelling:{missing:{service:"Le v\xe9rificateur d'orthographe est introuvable\xa0: ({0})."}},images:{edit:{needsproxy:"Un proxy est n\xe9cessaire pour la modification des images de ce domaine\xa0: ({0})",proxyerror:"Impossible de communiquer avec le proxy pour modifier cette image. Voir la console pour plus d'informations.",generic:"Une erreur est survenue pendant l'op\xe9ration de modification de l'image. Voir la console pour plus d'informations."},disallowed:{local:"Le collage de l'image locale a \xe9t\xe9 d\xe9sactiv\xe9. Les images locales ont \xe9t\xe9 supprim\xe9es du contenu coll\xe9.",dragdrop:"La fonction couper-coller a \xe9t\xe9 d\xe9sactiv\xe9e."},upload:{unknown:"\xc9chec du chargement de l'image",invalid:"Tous les fichiers n'ont pas pu \xeatre trait\xe9s (certaines images ne sont pas valides)",failed:"\xc9chec du chargement de l'image\xa0: ({0}).",cors:"Impossible de contacter le service de chargement d'images. Erreur CORS possible\xa0: ({0})"},missing:{service:"Le service d'image est introuvable\xa0: ({0}).",flash:"Il est possible que les param\xe8tres de s\xe9curit\xe9 de votre navigateur emp\xeachent l'importation d'images."},import:{failed:"\xc9chec de l'importation de certaines images.",unsupported:"Type d'image non pris en charge.",invalid:"L'image n'est pas valide."}},safari:{image:"Safari ne prend pas en charge le collage direct d'images.",url:"Plus d'informations sur le collage d'images dans Safari",rtf:"Plus d'informations sur le collage dans Safari"},flash:{crashed:"Des images n'ont pas \xe9t\xe9 import\xe9es car Adobe Flash semble s'\xeatre bloqu\xe9. Cet incident est peut-\xeatre d\xfb au collage de documents importants."},http:{400:"Requ\xeate incorrecte\xa0: {0}",401:"Non autoris\xe9\xa0: {0}",403:"Interdit\xa0: {0}",404:"Introuvable\xa0: {0}",407:"Authentification proxy requise\xa0: {0}",409:"Conflit de fichiers\xa0: {0}",413:"Charge utile trop grande\xa0: {0}",415:"Type de support non pris en charge\xa0: {0}",500:"Erreur interne du serveur\xa0: {0}",501:"Non mis en \u0153uvre\xa0: {0}"}}}},b=function(a,b){return a.src.indexOf(b)===a.src.length-b.length},c=function(a){for(var b=a.split("."),c=window,d=0;d<b.length&&void 0!==c&&null!==c;++d)c=c[b[d]];return c},d=function(a,d){for(var e,f=document.getElementsByTagName("script"),g=0;g<f.length;g++)if(e=b(f[g],a)){var h=f[g].getAttribute("data-main");if(void 0===h)throw"no data-main attribute found on "+d+" script tag";f[g].removeAttribute("data-main");var i=c(h);if("function"!=typeof i)throw"attribute on "+d+" does not reference a global method";return i}throw"cannot locate "+d+" script tag"},e=d("tbio_fr.js","strings for language fr");e({strings:a})}();