<?php
  /**
   * main file of string conversion
   * 
   */

  /** parameters */
  $page_dir   = '/string_conversion';
  $pass_front = $_SERVER['DOCUMENT_ROOT'] . $page_dir;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
    <title><?php echo htmlentities( $_SERVER['PHP_SELF'] ); ?></title>
  </head>
  <body>
    <?php include_once './modules/_header.php'; ?>

    <main>
      <h1><?php echo htmlentities( $_SERVER['PHP_SELF'] ); ?></h1>
      <section class="string-conversion">
        <div class="method-selector" id="divMethodSelector">
          <button id="buttonMethodBase64" type="button">Base64</button>
          <button id="buttonMethodHash" type="button">Hash</button>
          <button id="buttonMethodUuencode" type="button">UUENCODE</button>
        </div>

        <?php include_once './modules/function/hash.php'; ?>
        <?php include_once './modules/function/base64.php'; ?>
        <?php include_once './modules/function/uuencode.php'; ?>
      </section>
    </main>

    <?php include_once './modules/_footer.php'; ?>

    <script>
      /** HTML elements */
      const elementFormBase64Codec      = document.getElementById( 'formBase64Codec' );
      const elementFormHashGeneration   = document.getElementById( 'formHashGeneration' );
      const elementFormUuencodeCodec    = document.getElementById( 'formUuencodeCodec' );
      const elementButtonMethodBase64   = document.getElementById( 'buttonMethodBase64' );
      const elementButtonMethodHash     = document.getElementById( 'buttonMethodHash' );
      const elementButtonMethodUuencode = document.getElementById( 'buttonMethodUuencode' );

      /** functions */
      function displayBase64() {
        elementFormBase64Codec.style.display      = 'flex';
        elementFormHashGeneration.style.display   = 'none';
        elementFormUuencodeCodec.style.display    = 'none';
        elementButtonMethodHash.style.border     = 'hidden';
        elementButtonMethodBase64.style.border   = 'rgb(127, 127, 127) solid thin';
        elementButtonMethodUuencode.style.border = 'hidden';
      }

      function displayHash() {
        elementFormBase64Codec.style.display      = 'none';
        elementFormHashGeneration.style.display   = 'flex';
        elementFormUuencodeCodec.style.display    = 'none';
        elementButtonMethodHash.style.border     = 'rgb(127, 127, 127) solid thin';
        elementButtonMethodBase64.style.border   = 'hidden';
        elementButtonMethodUuencode.style.border = 'hidden';
      }

      function displayUuencode() {
        elementFormBase64Codec.style.display      = 'none';
        elementFormHashGeneration.style.display   = 'none';
        elementFormUuencodeCodec.style.display    = 'flex';
        elementButtonMethodHash.style.border     = 'hidden';
        elementButtonMethodBase64.style.border   = 'hidden';
        elementButtonMethodUuencode.style.border = 'rgb(127, 127, 127) solid thin';
      }

      /** Actions when click elements */
      elementButtonMethodHash.addEventListener( 'click', () => {
        displayHash();
      }, false );

      elementButtonMethodBase64.addEventListener( 'click', () => {
        displayBase64();
      }, false );

      elementButtonMethodUuencode.addEventListener( 'click', () => {
        displayUuencode();
      }, false );

      /** For display after string post */
      <?php if ( isset( $_POST[ 'conversion-method' ] ) ): ?>
        const conversionMethod = '<?php echo $_POST[ 'conversion-method' ]; ?>';
        switch ( conversionMethod ) {
          case 'base64':
            displayBase64();
            break;
          case 'hash':
            displayHash();
            break;
          case 'uuencode':
            displayUuencode();
            break;
          default:
            displayHash();
            break;
        }
      <?php else: ?>
        displayHash();
      <?php endif; ?>
    </script>
  </body>
</html>