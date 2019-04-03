@extends('master')

@section('title', 'Rules')

@section('content')
<div class="rules_container">

  <h1 class="content_title"><i class="fas fa-ban"></i> Rules</h1>
  <div class="rules_header">
    <p>The following rules are to be abide by every player. If a player is found breaking any of the rules, action will be taken against them.</p>
    <p class="subtext">These rules apply to anyone and anywhere. (Forum, private message, local chat etc.)</p>
  </div>

  <div class="rules_grid">

    {{-- Chat Rules --}}
    <div class="rules">
      <h2><i class="fas fa-comment-alt"></i> Chat Rules</h2>

      <div class="rule">No Caps Abuse</div>
      <div class="rule_explaination">It's easy, stick to a maximum of 1 sentence.</div>

      <div class="rule">Don't Chat Flood</div>
      <div class="rule_explaination">This rule varies with the number of people online.</div>

      <div class="rule">No spam</div>
      <div class="rule_explaination">Don't spam messages. This does not apply in local or plot chat.</div>

      <div class="rule">English Only</div>
      <div class="rule_explaination">Most of our staff members mainly speak English, so don't be annoying. This rule only applies in Global chat.</div>

      <div class="rule">No Swearing</div>
      <div class="rule_explaination">No excessive or swearing to offend.</div>

      <div class="rule">No Advertising</div>
      <div class="rule_explaination">No advertising links or server ips unless related to The Forgotten District.</div>

      <div class="rule">No Inappropriate Content</div>
      <div class="rule_explaination">Don’t be excessively inappropriate. Exception: Local or plot chat etc.</div>

      <div class="rule">No Harassment</div>
      <div class="rule_explaination">Don't harass other players or just generally be annoying.</div>

      <div class="rule">No begging</div>
      <div class="rule_explaination">If you want something, ask politely. Otherwise obtain it yourself if denied.</div>
    </div>

    {{-- TP Rules --}}
    <div class="rules">
      <h2><i class="fas fa-walking"></i> TP Rules</h2>

      <div class="rule">TP Spam</div>
      <div class="rule_explaination">Don't spam the person you are trying to Teleport to, especially if they have declined.</div>

      <div class="rule">Tp Killing / Trolling</div>
      <div class="rule_explaination">Don't kill someone after they've Teleported to you or vice versa.</div>
    </div>

    {{-- Client Mod Rules --}}
    <div class="rules">
      <h2><i class="fas fa-bug"></i> Client Mod Rules</h2>

      <div class="rule">No Movement Hacks</div>
      <div class="rule_explaination">Speed, Fly, No-Clip, Free aim, etc</div>

      <div class="rule">No PvP Hacks</div>
      <div class="rule_explaination">Kill-Aura, Aimbots, Tracers, etc</div>

      <div class="rule">No Auto Hacks</div>
      <div class="rule_explaination">AutoArmor, AutoSoup, AutoPot, AutoShoot</div>

      <div class="rule">In short</div>
      <div class="rule_explaination">Unless the mod/client has been approved on the forums/discord by a staff member the mod/client is not allowed.</div>
    </div>

    {{-- Building Rules --}}
    <div class="rules">
      <h2><i class="fas fa-hammer"></i> Building Rules</h2>

      <div class="rule">No Inappropriate Builds</div>
      <div class="rule_explaination">No Swastikas, Genitals, etc</div>

      <div class="rule">No Greifing</div>
      <div class="rule_explaination">No breaking or adding blocks to a person's build without their permission.</div>

      <div class="rule">Automatic Farms</div>
      <div class="rule_explaination">No farms that require no effort to run/use.</div>

      <div class="rule">Afk Pools</div>
      <div class="rule_explaination">No using AFK pools to load chunks for Automatic Farms or for any other purposes.</div>
    </div>

    {{-- Skin and IGN Rules --}}
    <div class="rules">
      <h2><i class="fas fa-user-injured"></i> Skin and IGN Rules</h2>

      <div class="rule">No Inappropriate Skins</div>
      <div class="rule_explaination">No inappropriate or offensive skins.</div>

      <div class="rule">No Inappropriate IGNs</div>
      <div class="rule_explaination">No inappropriate or offensive usernames.</div>

      <div class="rule">No Impersonations</div>
      <div class="rule_explaination">Don't impersonate staff members or other players.</div>
    </div>

  </div>
</div>
@endsection
