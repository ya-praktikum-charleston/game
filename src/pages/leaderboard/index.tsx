import React from 'react';
import './leaderboard.css';
import ForwardIcon from '../../assets/svg/forward.svg';

export default function LeaderboardPage() {
    return (
        <div className="background">
            <div className="box-content mainFontFamily">
                <div className="content">
                    <div className="header">
                        <div className="btn-back">
                            <img className="btn-back-icon" src={ForwardIcon} alt="forward" />
                        </div>
                        <div className="titlePage header-title">Таблица лидеров</div>
                    </div>
                    <div className="table-loaderboard">
                        <div>
                            <div className="table-leaderboard-item">
                                <div className="item-number">1</div>
                                <div className="item-img"></div>
                                <div className="item-name">MAX</div>
                                <div className="item-count">60000</div>
                            </div>
                            <div className="table-leaderboard-item">
                                <div className="item-number">2</div>
                                <div className="item-img2"></div>
                                <div className="item-name">Sanka</div>
                                <div className="item-count">54300</div>
                            </div>
                            <div className="table-leaderboard-item">
                                <div className="item-number">3</div>
                                <div className="item-img3"></div>
                                <div className="item-name">Kira</div>
                                <div className="item-count">43005</div>
                            </div>
                        </div>
                        <div>
                            <div className="table-leaderboard-item">
                                <div className="item-number">4</div>
                                <div className="item-img"></div>
                                <div className="item-name">MAX</div>
                                <div className="item-count">32001</div>
                            </div>
                            <div className="table-leaderboard-item">
                                <div className="item-number">5</div>
                                <div className="item-img3"></div>
                                <div className="item-name">Ira</div>
                                <div className="item-count">30015</div>
                            </div>
                            <div className="table-leaderboard-item">
                                <div className="item-number">6</div>
                                <div className="item-img"></div>
                                <div className="item-name">Igor</div>
                                <div className="item-count">29015</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}
