import React from 'react';
import './forum.css';
import AddIcon from '../../assets/svg/add.svg';
import ForwardIcon from '../../assets/svg/forward.svg';

export default function ForumPage() {
    return (
        <div className="background">
            <div className="box-content mainFontFamily">
                <div className="content">
                    <div className="header">
                        <div className="btn-back">
                            <img className="btn-back-icon" src={ForwardIcon} alt="forward" />
                        </div>
                        <div className="titlePage header-title">Форум</div>
                    </div>
                    <div className="table-forum">
                        <div className="table-forum-item">
                            <div className="item-topics">Новые игры</div>
                            <div className="item-topics-count">
                                <div className="item-topics-value">222</div>
                                <img className="item-topics-icon" src={AddIcon} alt="add" />
                            </div>
                            <div className="item-answers">345</div>
                        </div>
                        <div className="table-forum-item">
                            <div className="item-topics">Геймдизайнеры</div>
                            <div className="item-topics-count">
                                <div className="item-topics-value">5</div>
                                <img className="item-topics-icon" src={AddIcon} alt="add" />
                            </div>
                            <div className="item-answers">14</div>
                        </div>
                        <div className="table-forum-item">
                            <div className="item-topics">Технологии</div>
                            <div className="item-topics-count">
                                <div className="item-topics-value">590</div>
                                <img className="item-topics-icon" src={AddIcon} alt="add" />
                            </div>
                            <div className="item-answers">895</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}
