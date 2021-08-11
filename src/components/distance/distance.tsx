import React from 'react';
import { Props, DistanceProps } from './types';

import './distance.css';

const Distance: Props = ({ distance }: DistanceProps) => (
    <div className="distance">{distance}</div>
);

export default Distance;
