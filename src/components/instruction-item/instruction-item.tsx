import React from 'react';
import { Props, InstructionItemProps } from './types';

import './instruction-item.css';

const InstructionItem: Props = ({ imgLink, imgAlt, text }: InstructionItemProps) => (
    <div className="instruction">
        <div className="instruction__img">dawd
            <img src={imgLink} alt={imgAlt} />
        </div>
        <div className="instruction__text">{text}</div>
    </div>
);

export default InstructionItem;
