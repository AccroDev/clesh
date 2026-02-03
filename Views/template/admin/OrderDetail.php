<?php
use Controllers\PanierController;
use Models\Getter;

$id = $params["id"]; 
// On récupère les données exactes du contrôleur
$details = PanierController::getCartDetails($id, true); 

if (!$details) {
    echo "<p class='p-10 text-center text-red-500 font-bold'>Order not found.</p>";
    return;
}

// Extraction propre des variables pour éviter les "undefined"
$items = $details['items'];
$total = $details['total_amount'];
$devise = $details['devise'];

// Optionnel : On récupère les infos du panier pour la date et le user_id
$cartBase = Getter::get("carts", ["id" => $id]);
?>

<main class="flex-1 flex justify-center py-8 px-4 md:px-10 ">
    <div class="layout-content-container flex flex-col max-w-[1120px] w-full gap-6">
        
        <nav class="flex flex-wrap items-center gap-2 px-4 py-2 bg-white/50 dark:bg-white/5 rounded-xl backdrop-blur-sm">
            <a class="text-primary hover:underline text-sm font-medium flex items-center gap-1" href="/admin">
                <span class="material-symbols-outlined text-sm">Acceil</span> Admin
            </a>
            <span class="text-[#897261] text-sm">/</span>
            <a class="text-primary hover:underline text-sm font-medium" href="/admin/orders">Orders</a>
            <span class="text-[#897261] text-sm">/</span>
            <span class="text-[#181411] dark:text-white text-sm font-semibold tracking-tight uppercase">#ORD-<?= $id ?></span>
        </nav>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 px-4">
            <div>
                <h1 class="text-[#181411] dark:text-white tracking-tight text-[32px] font-bold leading-tight">Détails de la commande</h1>
                <p class="text-[#897261] text-sm italic">
                   Placé sur <?= isset($cartBase['created_at']) ? date('F j, Y \a\t g:i A', strtotime($cartBase['created_at'])) : 'Unknown date' ?>
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 px-4">
            <div class="flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-[#2d2218] border border-[#e6e0db] dark:border-[#3d3228] shadow-sm">
                <div class="flex items-center gap-2 text-[#897261]">
                    <span class="material-symbols-outlined text-xl text-primary">paiements</span>
                    <p class="text-sm font-medium uppercase tracking-tighter">Montant total</p>
                </div>
                <p class="text-[#181411] dark:text-white text-2xl font-black italic"><?= number_format($total, 2) ?> <?= $devise ?></p>
            </div>
            <div class="flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-[#2d2218] border border-[#e6e0db] dark:border-[#3d3228] shadow-sm">
                <div class="flex items-center gap-2 text-[#897261]">
                    <span class="material-symbols-outlined text-xl">currency_exchange</span>
                    <p class="text-sm font-medium uppercase tracking-tighter">Devise</p>
                </div>
                <p class="text-[#181411] dark:text-white text-2xl font-bold uppercase"><?= $devise === '$' ? 'USD' : 'EUR' ?></p>
            </div>
            <div class="flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-[#2d2218] border border-[#e6e0db] dark:border-[#3d3228] shadow-sm">
                <div class="flex items-center gap-2 text-[#897261]">
                    <span class="material-symbols-outlined text-xl">shopping_basket</span>
                    <p class="text-sm font-medium uppercase tracking-tighter">Nombre d'articles</p>
                </div>
                <p class="text-[#181411] dark:text-white text-2xl font-bold"><?= count($items) ?> Units</p>
            </div>
            <div class="flex flex-col gap-2 rounded-xl p-6 bg-white dark:bg-[#2d2218] border border-[#e6e0db] dark:border-[#3d3228] shadow-sm">
                <div class="flex items-center gap-2 text-[#897261]">
                    <span class="material-symbols-outlined text-xl text-green-500">verified_user</span>
                    <p class="text-sm font-medium uppercase tracking-tighter">Status</p>
                </div>
                <div class="flex items-center gap-2">
                    <span class="flex h-2 w-2 rounded-full bg-green-500 animate-pulse"></span>
                    <p class="text-green-600 tracking-tight text-2xl font-bold uppercase"><?= $cartBase['status'] ?? 'Active' ?></p>
                </div>
            </div>
        </div>

        <div class="bg-white dark:bg-[#2d2218] rounded-xl border border-[#e6e0db] dark:border-[#3d3228] shadow-sm overflow-hidden mx-4">
            <div class="flex flex-wrap items-center justify-between gap-4 p-6 border-b border-[#e6e0db] dark:border-[#3d3228]">
                <h2 class="text-xl font-bold text-[#181411] dark:text-white italic">Ordered Products</h2>
                <div class="flex gap-3">
                    <button class="bg-primary text-white text-xs font-black px-4 py-2 rounded-lg hover:opacity-90 transition-all uppercase tracking-widest">
                        Confirm Delivery
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-50 dark:bg-[#3d3228]/30">
                            <th class="px-6 py-4 text-xs font-black uppercase text-slate-400">Product</th>
                            <th class="px-6 py-4 text-xs font-black uppercase text-slate-400 hidden sm:table-cell">Price</th>
                            <th class="px-6 py-4 text-xs font-black uppercase text-slate-400">Qty</th>
                            <th class="px-6 py-4 text-right text-xs font-black uppercase text-slate-400">Total</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#e6e0db] dark:divide-[#3d3228]">
                        <?php foreach($items as $item): ?>
                        <tr class="group hover:bg-slate-50/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <img src="<?= $item['image'] ?>" class="h-12 w-12 rounded-lg object-cover border border-slate-100 shadow-sm">
                                    <div>
                                        <p class="text-sm font-bold text-[#181411] dark:text-white"><?= htmlspecialchars($item['nom']) ?></p>
                                        <p class="text-[10px] uppercase font-bold text-[#897261]"><?= htmlspecialchars($item['categorie'] ?? 'General') ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-[#897261] text-sm hidden sm:table-cell"><?= number_format($item['prix_unitaire'], 2) ?> <?= $devise ?></td>
                            <td class="px-6 py-4 text-sm font-medium">x <?= $item['quantite'] ?></td>
                            <td class="px-6 py-4 text-right text-sm font-black text-primary italic">
                                <?= number_format($item['sous_total'], 2) ?> <?= $devise ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr class="bg-slate-50/30">
                            <td class="px-6 py-8 text-right font-black text-slate-400 uppercase text-xs" colspan="3">Grand Total</td>
                            <td class="px-6 py-8 text-right text-2xl font-black text-[#181411] dark:text-white italic">
                                <?= number_format($total, 2) ?> <?= $devise ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 px-4 mb-10">
            <div class="p-6 bg-white dark:bg-[#2d2218] rounded-xl border border-[#e6e0db] dark:border-[#3d3228]">
                <div class="flex items-center gap-2 mb-4">
                    <span class="material-symbols-outlined text-primary">person</span>
                    <h3 class="font-bold text-[#181411] dark:text-white italic uppercase tracking-tighter">Customer Information</h3>
                </div>
                <?php 
                    $user = $cartBase['user_id'] ? Getter::get("users", ["id" => $cartBase['user_id']]) : null;
                    if ($user): 
                ?>
                    <p class="text-sm font-black text-slate-800"><?= htmlspecialchars($user['name']) ?></p>
                    <p class="text-xs text-slate-500"><?= htmlspecialchars($user['email']) ?></p>
                    <p class="text-xs text-slate-500 font-bold mt-1"><?= htmlspecialchars($user['email'] ?? 'No phone linked') ?></p>
                <?php else: ?>
                    <p class="text-sm text-amber-600 font-bold italic">Anonymous Guest / No user linked</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>