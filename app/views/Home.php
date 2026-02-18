<h1>TomTroc fonctionne ✅</h1>

<?php if ($user): ?>
    <p>Bonjour <?= htmlspecialchars($user['pseudo']) ?> 👋</p>
<?php else: ?>
    <p>Aucun utilisateur trouvé.</p>
<?php endif; ?>
