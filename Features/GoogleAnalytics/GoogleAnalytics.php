<?php
// TODO: remove phpcs ignore once script tag issue is fixed on jenkins
// @codingStandardsIgnoreFile

namespace Flynt\Features\GoogleAnalytics;

class GoogleAnalytics {

  public function __construct($id, $anonymizeIp, $skippedUsers, $skippedIps) {
    $this->googleAnalyticsId = $id;
    $this->anonymizeIp = $anonymizeIp;
    $this->skippedUsers = $skippedUsers;
    $this->skippedIps = $skippedIps;

    if ($this->skippedIps) {
      $skippedIps = explode(',', $this->skippedIps);
      $this->skippedIps = array_map('trim', $skippedIps);
    }

    if ($this->isValidId($this->googleAnalyticsId)) {
      // cases:
      // - If you are not listed as non tracked (on the options), add the action
      // - If  your ip is not listed as non tracked, add the action
      $user = wp_get_current_user();
      if ((!$this->skippedUsers || !array_intersect($this->skippedUsers, $user->roles)) || (is_array($this->skippedIps) && !in_array($_SERVER['REMOTE_ADDR'], $this->skippedIps))) {
        add_action('wp_footer', [$this, 'addScript'], 20, 1);
      }
    } else if ($this->googleAnalyticsId != 1 && !isset($_POST['acf'])) {
      trigger_error('Invalid Google Analytics Id: ' . $this->googleAnalyticsId, E_USER_WARNING);
    }
  }

  public function addScript() { // @codingStandardsIgnoreLine ?>
    <script>
      <?php if (WP_ENV === 'production') : ?>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
      <?php else : ?>
        function ga() {
          console.log('GoogleAnalytics: ' + [].slice.call(arguments));
        }
      <?php endif; ?>
      ga('create','<?php echo $this->googleAnalyticsId; ?>','auto');ga('send','pageview');
      <?php if($this->anonymizeIp == 1) : ?>
      ga('set', 'anonymizeIp', true);
      <?php endif; ?>
    </script>
    <?
  }

  private function isValidId($gaId) {
    return preg_match('/^ua-\d{4,10}-\d{1,4}$/i', strval($gaId));
  }
}
