@extends('layouts.reverse')

@section('title', 'Support Us')

@section('content')

{{-- Voting --}}
<div class="side_container voting_container">
  <h2 class="title"><i class="fas fa-vote-yea"></i> Vote for us</h2>
  <div class="subtitle">You can vote for the server once every day.</div>

  <div class="votinglink">
    <a href="https://minecraftservers.org/vote/447542">Minecraft Servers</a>
  </div>
  <div class="votinglink">
    <a href="https://minecraft-server-list.com/server/401799/vote/">Minecraft Server List</a>
  </div>
  <div class="votinglink">
    <a href="https://minecraft-tracker.com/server/4534/vote/">Minecraft Tracker</a>
  </div>
  <div class="votinglink">
    <a href="https://www.planetminecraft.com/server/the-forgotten-district/vote/">Planet Minecraft</a>
  </div>

  <h2 class="title"><i class="fas fa-person-booth"></i> Voting Rewards</h2>
  <ul>
    <li>2 Tokens</li>
    <li>1 diamond</li>
    <li>£150 ingame</li>
    <li>T1 vote key</li>
    <li>Max 15 credits/day</li>
  </ul>
</div>

{{-- Voting --}}
<div class="main_container donation_container">
  <h2 class="title"><i class="fas fa-donate"></i> Donations</h2>
  <div class="subtitle">Donate to gain extra perks or just to support us.</div>

  <div class="donationlink">
    <a href="http://theforgottendistrict.buycraft.net/">Donate Now</a>
  </div>

  <h2 class="title"><i class="fas fa-hand-holding-usd"></i> Donation Ranks</h2>
  <div class="subtitle">If you have already purchased a rank and you decide to upgrade your rank, the cost of your current rank will be substracted of the cost of the upgrade.</div>

  <div class="donation_ranks">

    <div class="card">
      <div class="rank">Lieutenant <span class="prize">£5.00</span></div>
      <div class="descr">The cheapest of our donator ranks.</div>
      <ul>
        <li>Max Homes: 5</li>
        <li>Fly: 3 months</li>
        <li>Kits: Luitenant</li>
        <li>Bonus Claimblocks: 5000</li>
        <li>Disguises: Basic animals</li>
        <li>Commands: /feed, /hat, /anvil, /chest</li>
      </ul>

      <ul>
        <li>+ £2500 ingame</li>
        <li>+ 1 Decorative Heads key</li>
        <li>+ 1 Decorative Blocks key</li>
      </ul>
    </div>

    <div class="card">
      <div class="rank">Captain <span class="prize">£10.00</span></div>
      <div class="descr">The one coming up after Luietenant.</div>
      <ul>
        <li>Max Homes: 10</li>
        <li>Fly: 6 months</li>
        <li>Kits: Luitenant, Captain</li>
        <li>Bonus Claimblocks: 10 000</li>
        <li>Disguises: Basic animals and mobs</li>
        <li>Commands: /feed, /hat, /anvil, /chest, /heal</li>
      </ul>

      <ul>
        <li>+ £5000 ingame</li>
        <li>+ 1 pvp key</li>
        <li>+ 1 Decorative Heads key</li>
        <li>+ 1 Decorative Blocks key</li>
      </ul>
    </div>

    <div class="card">
      <div class="rank">Major <span class="prize">£20.00</span></div>
      <div class="descr">The one rank that comes with a major step-up.</div>
      <ul>
        <li>Max Homes: 20</li>
        <li>Fly: 9 months</li>
        <li>Kits: Luitenant, Captain, Major</li>
        <li>Bonus Claimblocks: 15 000</li>
        <li>Disguises: All animals and basic mobs</li>
        <li>Commands: /feed, /hat, /anvil, /chest, /heal, /nick</li>
        <li>Signs: [heal], [feed], color codes</li>
        <li>Create: Chairs, Elevators</li>
      </ul>

      <ul>
        <li>+ £10 000 ingame</li>
        <li>+ 1 pvp keys</li>
        <li>+ 2 Decorative Heads keys</li>
        <li>+ 2 Decorative Blocks keys</li>
      </ul>
    </div>

    <div class="card">
      <div class="rank">Colonel <span class="prize">£35.00</span></div>
      <div class="descr">The rank that comes just before General, our highest donor rank.</div>
      <ul>
        <li>Max Homes: 10</li>
        <li>Fly: 12 months</li>
        <li>Kits: Luitenant, Captain, Major, Colonel</li>
        <li>Bonus Claimblocks: 20 000</li>
        <li>Disguises: All animals and mobs</li>
        <li>Commands: /feed, /hat, /anvil, /chest, /heal, /nick</li>
        <li>Signs: [heal], [feed], [balance], [disposal] , color codes</li>
        <li>Create: Chairs, Elevators</li>
      </ul>

      <ul>
        <li>+ £17 500 ingame</li>
        <li>+ 2 pvp keys</li>
        <li>+ 3 Decorative Heads keys</li>
        <li>+ 3 Decorative Blocks keys</li>
      </ul>
    </div>

    <div class="card">
      <div class="rank">General <span class="prize">£50.00</span></div>
      <div class="descr">General, our highest ranking donor.</div>
      <ul>
        <li>Max Homes: Unlimted</li>
        <li>Fly: Unlimted</li>
        <li>Kits: Luitenant, Captain, Major, Colonel, General</li>
        <li>Bonus Claimblocks: 25 000</li>
        <li>Disguises: All</li>
        <li>Commands: /feed, /hat, /anvil, /chest, /heal, /nick</li>
        <li>Signs: [heal], [feed], [balance], [disposal] , color codes</li>
        <li>Create: Chairs, Elevators</li>
      </ul>

      <ul>
        <li>+ £25 000 ingame</li>
        <li>+ 3 pvp keys</li>
        <li>+ 3 Decorative Heads keys</li>
        <li>+ 3 Decorative Blocks keys</li>
      </ul>
    </div>

  </div>

  <h2 class="title"><i class="fas fa-hand-holding-usd"></i> Crate Keys</h2>
  <div class="subtitle">Besides ranks you can also buy keys. We offer 3 packages with keys for you to buy.</div>

  <div class="donation_ranks">

    <div class="card">
      <div class="rank">Huge Pack <span class="prize">£20.00</span></div>
      <div class="descr">Keys for fun and pvp, a lot of them</div>

      <ul>
        <li>Decorative Head Keys: 30</li>
        <li>Decorative Block Keys: 20</li>
        <li>PvP Crate Keys: 10</li>
      </ul>
    </div>

    <div class="card">
      <div class="rank">Fun Pack <span class="prize">£12.50</span></div>
      <div class="descr">An average amount of keys to enjoy.</div>

      <ul>
        <li>Decorative Head Keys: 20</li>
        <li>Decorative Block Keys: 10</li>
        <li>PvP Crate Keys: 6</li>
      </ul>
    </div>

    <div class="card">
      <div class="rank">Mini Pack <span class="prize">£5.00</span></div>
      <div class="descr">A few keys at an affordable prize.</div>

      <ul>
        <li>Decorative Head Keys: 10</li>
        <li>Decorative Block Keys: 6</li>
        <li>PvP Crate Keys: 3</li>
      </ul>
    </div>

  </div>

</div>

@endsection
