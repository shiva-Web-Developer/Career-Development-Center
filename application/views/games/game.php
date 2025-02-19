<style>
    .game-btn{
        border-radius: 4px;
        padding: 4px;
        font-weight: bold !important;
        margin: 15px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
</style>
<main>
    
    <div class="col-lg-12 text-center" style="margin-top: 20px;">
        <span style="font-weight: bold; display: block; margin-bottom: 10px;color:#29a329;"><b>Play and Earn</b></span>
        <span>Turn your leisure into treasure with 'Play and Earn' - where every game is a chance to win.</span>
    </div>
    
    <div class="col-lg-12 text-center" style="margin-top: 20px;">
        <a href="<?= base_url('play/tetris') ?>" class="game-btn">
            <img src="<?= base_url('assets/icon/tetris.png') ?>" width="40%" height="auto">
            <span style="display: inline-block; padding: 5px; border: 1px solid #29a329; border-radius: 10%; text-align: center; line-height: 1;margin-top:5px;background-color:#993300;color:white;">Play Tetris</span>
        </a>
    </div>
    
     <div class="col-lg-12 text-center" style="margin-top: 10px;">
        <a href="<?= base_url('play/bowling') ?>" class="game-btn">
            <img src="<?= base_url('assets/icon/bowling.png') ?>" width="40%" height="auto">
            <span style="display: inline-block; padding: 5px; border: 1px solid #29a329; border-radius: 10%; text-align: center; line-height: 1;background-color:#993300;color:white;">Play Bowling</span>
        </a>
    </div>
    
    <div class="col-lg-12 text-center" style="margin-top: 20px;">
        <a href="<?= base_url('play/tictactoe') ?>" class="game-btn">
            <img src="<?= base_url('assets/icon/tictactoe.png') ?>" width="40%" height="auto"><br>
             <span style="display: inline-block; padding: 5px; border: 1px solid #29a329; border-radius: 10%; text-align: center; line-height: 1;background-color:#993300;color:white;">Play Tic-tac-toe</span>
        </a>
    </div>
    
    <div class="col-lg-12 text-center" style="margin-top: 20px;">
        <a href="<?= base_url('play-earn') ?>" class="game-btn">
            <img src="<?= base_url('assets/icon/cdcquizTime.png') ?>" width="40%" height="auto"><br>
            <span style="display: inline-block; padding: 5px; border: 1px solid #29a329; border-radius: 10%; text-align: center; line-height: 1;background-color:#993300;color:white;">Play Quiz</span>
        </a>
    </div>


    <!--<div class="flex flex-content-center flex-item-center flex-wrap">-->
    <!--    <a href="<?= base_url('play/tetris') ?>" class="game-btn">-->
    <!--        <img src="<?= base_url('assets/icon/tetris.png') ?>" width="80" height="auto">-->
    <!--        <span>Play Tetris</span>-->
    <!--    </a>-->
    <!--    <a href="<?= base_url('play/bowling') ?>" class="game-btn">-->
    <!--        <img src="<?= base_url('assets/icon/bowling.png') ?>" width="65" height="auto">-->
    <!--        <span>Play Bowling</span>-->
    <!--    </a>-->
    <!--    <a href="<?= base_url('play/tictactoe') ?>" class="game-btn">-->
    <!--        <img src="<?= base_url('assets/icon/tictactoe.png') ?>" width="65" height="auto">-->
    <!--        <span>Play Tic-tac-toe</span>-->
    <!--    </a>-->
    <!--     <a href="<?= base_url('play-earn') ?>" class="game-btn">-->
    <!--        <img src="<?= base_url('assets/icon/cdcquizTime.png') ?>" width="90" height="auto">-->
    <!--        <span>Play Quiz</span>-->
    <!--    </a>-->
    <!--</div>-->
    
</main>
