<?php
	namespace App\Http\ComposerProvider;
	use Illuminate\Contracts\View\View;

	use Sentinel;

	class CheckAuthComposer {

	    /**
	     * Bind data to the view.
	     *
	     * @param  View  $view
	     * @return void
	     */
	    public function compose(View $view)
	    {

        if (!session_id()) {
            session_start();
        }


        $fb = new \Facebook\Facebook([
          'app_id' => '1812749958752149',
          'app_secret' => '32a370b14d3b6140736ce7eaa13c962c',
          'default_graph_version' => 'v2.8',
        ]);
        $helper = $fb->getRedirectLoginHelper();

        $permissions = ['email']; // Optional permissions
        $loginUrl = $helper->getLoginUrl(url('/') . '/fb-callback', $permissions);

				$_SESSION['lastpage'] = $_SERVER['REQUEST_URI'];

        $view->with(['loginUrl'=>$loginUrl]);

	    }
	}

 ?>
