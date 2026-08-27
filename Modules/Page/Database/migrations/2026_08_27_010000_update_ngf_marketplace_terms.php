<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        $body = <<<'TERMS'
By using NGF Marketplace, creating an account, posting an advertisement or listing, contacting another user, buying, selling, or offering a service, you agree to these Terms.

1. NGF Provides the Marketplace
NGF LLC provides an online marketplace that allows independent buyers, sellers, and service providers to find and communicate with one another. Unless NGF specifically identifies itself as the seller in a particular transaction, NGF is not the buyer, seller, owner, manufacturer, distributor, broker, agent, guarantor, insurer, or party to a transaction between Marketplace users. NGF may charge listing, advertising, transaction-facilitation, promotional, subscription, or other service fees. Those fees pay for use of NGF Marketplace services and do not make NGF a party to the underlying transaction.

2. Buyers and Sellers Are Responsible for Their Own Deals
Users are responsible for deciding who they do business with and for checking the item, service, price, payment method, delivery method, and other terms of their transaction. NGF does not guarantee that a buyer will pay, that a seller will deliver, that an item is authentic or accurately described, that a service will be performed as promised, or that another user is trustworthy. Buyers and sellers should use reasonable care before exchanging money, merchandise, services, or personal information.

3. NGF Is Not Responsible for Deals That Go Bad
To the fullest extent permitted by law, NGF is not responsible for losses caused by another Marketplace user, including fraud, theft, nonpayment, nondelivery, damaged goods, counterfeit goods, false statements, poor-quality services, ownership disputes, or disagreements between buyers and sellers. NGF may provide reporting tools, review complaints, remove listings, suspend accounts, or preserve records, but NGF is not required to decide private disputes or reimburse a user for losses caused by another user.

4. No Warranty by NGF
NGF LLC does not make or imply any warranty, guarantee, representation, or promise concerning any item, service, buyer, seller, advertisement, or transaction conducted through NGF Marketplace. The fact that an item or service is advertised, discussed, purchased, sold, or paid for through NGF Marketplace does not mean NGF has inspected, approved, certified, guaranteed, or warranted it. Any warranty concerning an item or service is solely between the buyer and seller or, where applicable, the manufacturer or service provider. Use of NGF Marketplace does not create any express or implied warranty by NGF concerning quality, condition, safety, legality, authenticity, ownership, merchantability, fitness for a particular purpose, accuracy of a listing, delivery, payment, or performance. To the fullest extent permitted by law, NGF Marketplace is provided on an "as is" and "as available" basis.

5. Lawful Marketplace Use
NGF Marketplace is intended to be a broad marketplace for lawful goods and services. A category is not prohibited merely because it involves a specialized product or service. Users are responsible for complying with all laws, licenses, permits, taxes, shipping rules, age restrictions, and other legal requirements that apply to their listings and transactions. NGF may still refuse or remove a lawful listing when NGF reasonably considers it unsafe, misleading, inappropriate, harmful to the community, inconsistent with Marketplace standards, or unsuitable for the NGF brand.

6. Prohibited Firearms, Explosives, and Dangerous Weapons
NGF Marketplace does not permit the sale, advertisement, exchange, transfer, or facilitation of firearms, ammunition, firearm parts or accessories intended to assemble or operate a firearm, explosives, destructive devices, military ordnance, laser weapons, sonic weapons, directed-energy weapons, or other weapons or devices designed or reasonably capable of causing mass casualties, large-scale destruction, or serious public-safety harm. NGF may also prohibit components, materials, or equipment when a listing indicates they are intended to build, modify, arm, or operate a prohibited weapon or destructive device. These are zero-tolerance categories. NGF may immediately remove such listings and suspend or terminate the related account.

7. Other Illegal or Prohibited Activity
Users may not use NGF Marketplace to advertise, sell, buy, arrange, promote, conceal, or assist illegal or criminal activity. Prohibited activity includes fraud, stolen property, identity theft, money laundering, illegal drugs, counterfeit goods, unlawful trafficking, human trafficking, forced labor, sexual exploitation, violence-for-hire, illegal wildlife trafficking, or other serious criminal conduct.

8. Animals and Pets
Lawful pet and animal listings may be permitted where allowed by applicable law. Sellers are responsible for complying with all licensing, health, vaccination, breeding, transport, disclosure, and animal-welfare requirements that apply to the transaction. NGF does not permit listings involving stolen animals, animal fighting, endangered or protected species, illegal wildlife, animals offered for unlawful purposes, or transactions that violate animal-welfare or wildlife laws. NGF may refuse or remove an animal-related listing it reasonably considers unsafe, unlawful, misleading, cruel, or inappropriate.

9. Human Trafficking and Exploitation
NGF has zero tolerance for human trafficking, forced labor, sexual exploitation, coercion, trafficking-related recruitment, or use of the Marketplace to arrange, promote, conceal, or assist such conduct. Accounts credibly connected to this type of conduct may be immediately suspended while the matter is reviewed. If serious prohibited conduct is found to have occurred, the responsible user may be permanently banned from NGF Marketplace.

10. Serious Criminal Activity May Be Reported
NGF is not a law-enforcement agency and does not investigate ordinary legal disagreements between users. However, when NGF reasonably believes serious criminal activity has occurred through the Marketplace, NGF may report the matter to the appropriate law-enforcement authorities. NGF will also cooperate with lawful requests from law-enforcement agencies, courts, regulators, and other authorized government authorities.

11. Personal Services
Personal Services advertisements must offer legitimate and lawful services. Personal Services may not be used to advertise, solicit, arrange, or facilitate illegal sexual services, human trafficking, exploitation, fraud, illegal drug activity, criminal services, violence, or other prohibited conduct. If a service legally requires a license, certification, permit, or other professional authorization, the person offering the service is responsible for having the required qualification. NGF may require additional information, reject a listing, or place a listing under review before or after publication.

12. NGF May Refuse or Remove Ads
NGF Marketplace reserves the right, in its discretion, to refuse, reject, restrict, suspend, remove, or decline to publish any advertisement, listing, service offer, image, description, account content, or other material. A listing does not have to be illegal for NGF to refuse or remove it. NGF may remove content it considers inappropriate, misleading, offensive, unsafe, harmful, deceptive, inconsistent with the purpose or standards of the Marketplace, damaging to the NGF brand, or otherwise unsuitable for publication. Payment of a listing or advertising fee does not guarantee that an advertisement will be accepted or remain published.

13. Reports from Users and Third Parties
NGF may review Marketplace activity based on its own systems, user complaints, third-party reports, payment-provider information, business or organization reports, or information from law enforcement. A report by itself does not automatically prove wrongdoing. NGF may review available information before taking permanent action.

14. Warnings, Suspensions, and Permanent Bans
NGF may warn, restrict, suspend, or terminate users who violate Marketplace rules. Serious fraud, human trafficking, exploitation, serious criminal activity, prohibited weapons activity, or other major abuse of the Marketplace may result in a permanent lifetime ban. A permanently banned user may not create another account, use another person's account, provide false information, or otherwise attempt to avoid the ban. Accounts used to evade a ban may also be terminated.

15. Listings Must Be Truthful and Lawful
When posting a listing, a user represents that the user has the legal right to sell or offer what is being advertised, that the description is truthful, that important facts have not intentionally been hidden, that the item or service is lawful, and that the listing follows NGF Marketplace rules. Users are responsible for the content they post and for complying with laws that apply to their goods, services, taxes, licenses, permits, shipping, and transactions.

16. Marketplace Fees
Fees paid to NGF are payments for access to or use of NGF Marketplace services. They are not insurance, a warranty, or a guarantee that a transaction will be completed successfully. Any refund of NGF fees is governed by the refund or fee policy that applies to the particular service.

17. Protect Yourself
Users should use reasonable judgment when meeting strangers, making payments, shipping merchandise, purchasing expensive items, hiring someone for personal services, buying or adopting an animal, or sharing personal information. Do not send money or sensitive information when a transaction appears suspicious. Users should report suspicious activity to NGF using the available reporting tools.

18. Limitation of Liability
To the fullest extent permitted by applicable law, NGF will not be liable for indirect, incidental, special, punitive, exemplary, or consequential damages arising from a transaction or interaction between Marketplace users. To the fullest extent permitted by law, NGF's aggregate liability arising from a Marketplace transaction will not exceed the Marketplace fees actually paid to NGF by the claimant in connection with the transaction giving rise to the claim.

19. Changes to These Terms
NGF may update these Terms as the Marketplace grows, services change, or legal and business requirements change. The current version will be available through the Terms link on NGF Marketplace. Nothing in these Terms excludes or limits a responsibility that cannot legally be excluded or waives a consumer right that cannot legally be waived.
TERMS;

        $values = [
            'title' => 'Terms of Use',
            'excerpt' => 'The rules for using NGF Marketplace.',
            'body' => $body,
            'meta_title' => 'NGF Marketplace Terms of Use',
            'meta_description' => 'Terms of Use for NGF Marketplace, including buyer and seller responsibilities, prohibited activity, warranties, fees, and liability.',
            'placement' => 'legal',
            'is_published' => true,
            'sort_order' => 1,
            'updated_at' => now(),
        ];

        $query = DB::table('pages')
            ->where('slug', 'terms')
            ->whereNull('deleted_at');

        if ($query->exists()) {
            $query->update($values);
        } else {
            DB::table('pages')->insert(array_merge($values, [
                'slug' => 'terms',
                'created_at' => now(),
                'deleted_at' => null,
            ]));
        }
    }

    public function down(): void
    {
        DB::table('pages')
            ->where('slug', 'terms')
            ->whereNull('deleted_at')
            ->update([
                'title' => 'Terms of service',
                'excerpt' => 'The rules for using the marketplace.',
                'meta_title' => null,
                'meta_description' => 'Terms of service for the OpenClassify marketplace.',
                'body' => "Using the marketplace\nBy creating an account you agree to post accurate listings and to treat other members with respect.\n\nProhibited items\nWeapons, counterfeit goods, illegal substances, live animals, and stolen property may not be listed.\n\nAccount responsibility\nYou are responsible for the activity on your account and for keeping your credentials private.\n\nContent ownership\nYou keep ownership of the photos and text you upload and grant us permission to display them on the marketplace.\n\nTermination\nWe may suspend accounts that break these terms or that put other members at risk.",
                'updated_at' => now(),
            ]);
    }
};
