<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Rootsoft\Algorand\Algorand;
use WalletService;
class createwalletmodel extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */

    public function createWallet(WalletService $walletService) {
        dd('ok');
        // Create a new account
        $account = Algorand::accountManager()->createNewAccount();

        // Store information in encrypted session
        $walletService->storeAccount('algoland', $account->getPublicAddress(), $account->getSeedPhrase()->words);

        // Navigate back
        return redirect()->route('wallet.index');
    }


    public function render()
    {
        return view('components.createwalletmodel');
    }
}
